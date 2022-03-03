<?php
@require_once ('var.php');
class JWT{

    public static function generateTokenForm($idForm):string{
        $header = [
            'typ' => 'JWT',
            'alg' => 'SHA256'
        ];

        $payload = [
            'sub' => $idForm
        ];


        return JWT::generate($header, $payload, SECRET);
    }

    public static function generate(array $header, array $payload, string $secret, int $validity = 86400): string{

        if($validity > 0){
            $now = new DateTime();
            $exp = $now->getTimestamp() + $validity;
            $payload['iat'] = $now->getTimestamp();
            $payload['exp'] = $exp;
        }

        $base64header = base64_encode(json_encode($header));
        $base64payload = base64_encode(json_encode($payload));

        $base64header = str_replace(['+', '/', '='], ['-', '–', ''], $base64header);
        $base64payload = str_replace(['+', '/', '='], ['-', '–', ''], $base64payload);

        $secret = base64_encode(SECRET);

        $signature = hash_hmac('sha256', $base64header . '.' . $base64payload, $secret, true);

        $signature= str_replace(['+', '/', '='], ['-', '–', ''], base64_encode($signature));

        return $base64header . '.' . $base64payload . '.' . $signature;
    }

    public static function verify(string $token){
        $header = self::getHeader($token);
        $payload = self::getPayload($token);


        $verifyToken = self::generate($header, $payload, SECRET, 0);


        return $token === $verifyToken && !self::isExpired($token);
    }

    public static function getHeader(string $token): array{
        $array = explode('.', $token);

        $header = json_decode(base64_decode($array[0], true));

        return get_object_vars($header);
    }

    public static function getPayload(string $token): array{
        $array = explode('.', $token);

        $payload = json_decode(base64_decode($array[1], true));

        return get_object_vars($payload);
    }

    public static function isExpired(string $token){
        $payload = self::getPayload($token);

        $now = new DateTime();

        return $payload['exp'] < $now->getTimestamp();
    }

    public static function isValid(string $token){
        return preg_match(
            '/^[a-zA-Z0-9\-\_]+\.[a-zA-Z0-9\-\_]+\.[a-zA-Z0-9\-\_]+$',
                    $token
        ) === 1;
    }
}
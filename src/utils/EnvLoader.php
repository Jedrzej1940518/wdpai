<?php

class EnvLoader
{
        public static function loadEnv()
        {
            $dotenvPath = dirname(__DIR__).'../../.env';
            $dotenv = parse_ini_file($dotenvPath);

            foreach ($dotenv as $key => $value) {
                putenv("$key=$value");
            }
    }
}

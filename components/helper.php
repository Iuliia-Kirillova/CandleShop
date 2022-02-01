<?php

    class Helper
    {
        function generateToken($size = 32) {
            $symbols = [1, 2, 3, 4, 5, 6 ,7, 8, 9, 0,
                'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
                '!', '@', '#', '$', '%', '&', '?', '-', '+', '=', '~'
            ];
            $token = '';
            for ($i = 0; $i < $size; $i++) {
                $token .= $symbols[rand(0, count($symbols) - 1)];
            }
            return $token;
        }
    }

<?php

return [
    'required' => ':attribute を入力してください。',
    'email' => ':attribute はメールアドレス形式で入力してください。',
    'min' => [
        'string' => ':attribute は :min 文字以上で入力してください。',
    ],
    //必要に応じて追加
        'attributes' => [
        'name' => 'お名前',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
    ],
];

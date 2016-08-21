## これなに
自動で[かっこいいなまえ](https://shindanmaker.com/498477)で診断してツイッターの名前を変えます

## 使い方
適当にディレクトリ作って

```
git clone https://github.com/hexium310/changeKakkoiiNamae
composer require mpyw/cowitter:@dev
composer require vlucas/phpdotenv
```

`.env_org`を`.env`にリネームして`CONSUMER＿KEY`から`ACCESS＿TOKEN＿SECRET`にツイッターアカウントのそれを、`NAME`に診断に使用する名前を記入してください

```
php main.php
```

で実行できます

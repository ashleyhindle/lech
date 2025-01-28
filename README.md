# Snazzy URL shortening - lech
[![lech-logo](./public/favicon-96x96.png)](https://lech.ing)

## Requirements

- PHP 8.2
- NPM
- Composer
- Herd (ideally)

## Getting setup

We use sqlite locally for local development ease.

**Setup instructions**
```bash
cp .env.example .env
composer install
./artisan migrate

npm install
npm run build
composer run dev
```

It's best to use `herd` to link this project so it's available at `https://lech.test`, but you can also just run `php artisan serve` and visit `http://localhost:8000`.
```bash
herd link
herd secure
open "https://lech.test"
```

## API

Test API token is `lech_E64ujZycu1lDYIeO3jeIeTff0Jz0pH5lqFWbUzR97caaca42`.

You can use the `openapi.yaml` file to see the full API spec.


### Encoding

```bash
curl "https://lech.test/api/encode" -H "X-Api-Token: <token>" -H "Content-Type: application/json" -d '{"url": "https://www.google.com"}'
```


### Decoding

```bash
curl "https://lech.test/api/decode" -H "X-Api-Token: <token>" -H "Content-Type: application/json" -d '{"url": "https://lech.test/123456"}'
```

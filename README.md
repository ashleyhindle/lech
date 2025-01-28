# Snazzy URL shortening


## Getting setup

We use sqlite for local development for ease.
```bash
cp .env.example .env
composer install
php artisan migrate

npm install
npm run build
composer run dev
```

It's best to use `herd` to link this project so it's available at `https://lech.test`
```bash
herd link
herd secure
open "https://lech.test"
```

## API

Test API token is `lech_E64ujZycu1lDYIeO3jeIeTff0Jz0pH5lqFWbUzR97caaca42`.


### Encoding

```bash
curl -X POST "https://lech.test/api/encode" -H "X-Api-Token: <token>" -H "Content-Type: application/json" -d '{"url": "https://www.google.com"}'
```


### Decoding

```bash
curl -X POST "https://lech.test/api/decode" -H "X-Api-Token: <token>" -H "Content-Type: application/json" -d '{"url": "https://lech.test/123456"}'
```

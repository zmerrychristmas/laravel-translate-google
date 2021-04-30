## Laravel google Translate
A package integration with google translate, package can extend to new client translate.
Default support `google` translte and `stichoza` translate, any new client can add follow interface `ApiTranslatorContract`.

## Install
1. Clone repository from github
`
git clone git@github.com:zmerrychristmas/laravel-translate-google.git
`
2. check out branch `features/translator`
3. composer install
`composer install`
4. setup api-key
Inside package path: 'package\huybin\translator\src\config\laravel_translator', you will add your's google cloud translator api key.
## How it check
- Check via api get client translate: Google  
`curl -X GET \
  http://127.0.0.1:8000/api/api-translate \
  -H 'cache-control: no-cache' \
  -H 'postman-token: 1726e1a3-a3ea-dbff-abb1-5eb58f6c8f29'`
- Check translate  
`curl -X POST \
  http://127.0.0.1:8000/api/translate \
  -H 'cache-control: no-cache' \
  -H 'content-type: application/json' \
  -H 'postman-token: 81eed2ee-c66d-84bb-2743-2775831edeff' \
  -d '{
	"text": "Hello everyone!"
}'`
## Test 
Run following command:  
`
php artian test
`
## Extend Translate client
0. checkout new branch.
1. Add new custom api key at config file of packages.
2. At new instance TranslatorServiceProvider class.
3. Create merge request to master.
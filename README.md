## Steps

1) docker-compose up -d
2) docker-compose run --rm artisan config:cache  
3) docker-compose run --rm artisan config:clear
4) docker-compose run --rm artisan migrate
5) docker-compose run --rm artisan test --filter ElasticTest ( you might need to run it a second time to get results )


Available option to run composer 

- docker-compose run --rm composer 'command'

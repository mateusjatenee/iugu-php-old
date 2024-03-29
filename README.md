iugu-php  
================
[![Build Status](https://travis-ci.org/mateusjatenee/iugu-php.svg?branch=master)](https://travis-ci.org/mateusjatenee/iugu-php)



Lib super simples para integracão com a Iugu. Ainda está incompleta, então não recomendo que use em producão pois ainda falta vários recursos.  

#### Instalação usando o Composer
``` bash
$ composer require mateusjatenee/iugu-php
```

#### Changelog
Por favor veja o arquivo [CHANGELOG](CHANGELOG.md) para mais informações.

#### Rodando Testes
``` bash
$ phpunit
```

#### Contribuições
Por favor veja o arquivo [CONTRIBUTING](CONTRIBUTING.md) para mais informações.

## Uso  

A primeira coisa que deve ser feita é instalá-la pelo Composer. Para fazer isso, apenas rode `composer require mateusjatenee/iugu-php` no Terminal.  

Após isso, é necessário instânciar a classe `Iugu`. Essa lib se beneficia do Autoloader, então não é necessário usar o `require` em nada. Apenas certifique-se de ter importado o namespace certo.  (Mateusjatenee\Iugu).

```php
<?php 

use Mateusjatenee\Iugu\Iugu;

$iugu = new Iugu('SUA CHAVE DE API AQUI');

// Para gerar um Token  

$token = $iugu->token()->create([
    'account_id' => 'ID da sua conta aqui',
    'method' => 'credit_card',
    'data' => [
        'number' => '4111111111111111',
        'verification_value' => '123',
        'first_name' => 'Joao',
        'last_name' => 'Silva',
        'month' => '12',
        'year' => '2016',
    ],
]);

// Ou  

$token = $iugu->token->create([
    'account_id' => 'ID da sua conta aqui',
    'method' => 'credit_card',
    'data' => [
        'number' => '4111111111111111',
        'verification_value' => '123',
        'first_name' => 'Joao',
        'last_name' => 'Silva',
        'month' => '12',
        'year' => '2016',
    ],
]);

// Para gerar uma cobranca 

// Aqui você pode pegar um token pelo Iugu.js ou gerar um
$token = $iugu->token()->create([
    'account_id' => $account_id,
    'method' => 'credit_card',
    'test' => true,
    'data' => [
        'number' => '4111111111111111',
        'verification_value' => '123',
        'first_name' => 'Joao',
        'last_name' => 'Silva',
        'month' => '12',
        'year' => '2016',
    ],
]);

$charge = $iugu->charge()->create([
    "token" => $token->id,
    "email" => "teste@superteste.abc",
    "items" => [
        "description" => "Item Teste",
        "quantity" => "1",
        "price_cents" => "100",
    ],
]);

?>
```

Para ver mais exemplos e consultar os retornos, veja a documentacão. (em breve)



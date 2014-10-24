## Tray Checkout - PHP [![Build Status](https://secure.travis-ci.org/EscapeWork/tray-php.png)](http://travis-ci.org/EscapeWork/tray-php) [![Latest Stable Version](https://poser.pugx.org/escapework/tray-php/v/stable.png)](https://packagist.org/packages/escapework/tray-php) [![Total Downloads](https://poser.pugx.org/escapework/tray-php/downloads.png)](https://packagist.org/packages/escapework/tray-php)

Library PHP pra integrar com o [Tray Checkout](http://traycheckout.com.br/).

### Instalação

Adiciona a linha abaixo no seu `composer.json` e execute um `composer update`.

```javascript
    "require": {
        "escapework/tray-php": "0.1.*"
    }
```

### Criando transações

```php
use EscapeWork\Tray\Transaction;

$transaction = new Transaction();
$transaction->setOrderNumber('seu-id-do-pedido');
$transaction->setPriceDiscount(0);
$transaction->setUrlSeller('http://seu-site.com/url-de-retorno');
$transaction->setUrlNotification('http://seu-site.com/url-de-notificacao');
$transaction->setPostalCodeSeller('91780010');
$transaction->setShippingType('Grátis');
$transaction->setShippingPrice(0);

# produtos
$transaction->addProduct(array(
    'code'        => 'your-product-code',
    'description' => 'your-product-description',
    'quantity'    => 1,
    'price_unit'  => 'your-product-price',
));

$transaction->create();

$redirectUrl = $transaction->getUrl() . $transaction->getTokenTransaction();
```

Depois disto, você só precisa redirecionar o usuário para a `$redirectUrl`.

### Notificação de status

```php
$transaction = new Transaction();
$transaction->setTokenTransaction('token-da-notificacao');
$transaction->notification();


# depois disso, você pode consultar tudo isto:
$transaction->getOrderNumber();
$transaction->getFree();
$transaction->getTransactionId();
$transaction->getStatusId();
$transaction->getStatusName();
$transaction->getTokenTransaction();

# payment
$transaction->payment->getPricePayment();
$transaction->payment->getPaymentResponse();
$transaction->payment->getUrlPayment();
$transaction->payment->getTid();
$transaction->payment->getSplit();
$transaction->payment->getPaymentMethodId();
$transaction->payment->getPaymentMethodName();
$transaction->payment->getLinhaDigitavel();
```

#### Referências

* https://static.traycheckout.com.br/pdf/TrayCheckout-Manual-v1.0.pdf

#### Licença

MIT License.
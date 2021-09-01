<p align="center">
  <a href="https://github.com/llabbasmkhll/laravel-zibal">
    <img src="https://zibal.ir/static/media/logo-primary.68b6aace.svg" alt="Logo" height="80">
  </a>
  <br />
  <h2 align="center">laravel zibal</h2>

  <p align="center">
    transaction request package for zibal
    <br />
  </p>
</p>






<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple steps.

### Installation

1. You can install the package via composer:
   ```sh
   composer require llabbasmkhll/laravel-zibal 
   ```
2. publish config file to your project
   ```sh
   php artisan vendor:publish
   ```
3. change merchant value to your merchant id in config/zibal.php ( leave it if you just want to test the websirvices )
   ```sh
   return [
    'merchant' => 'zibal',
   ];
   ```


<!-- USAGE EXAMPLES -->
## Usage
according to zibals [official documentation](https://docs.zibal.ir/IPG/API)
there is 3 steps to issue a transaction in zibal

#### 1 . Request
in this step zibal gets basic information about the transaction and returns `trackId` that is needed for next step 
#### 2 . Start 
redirect the user to zibals gateway for payment
#### 3 . Verify
you can inspect the status of the transaction in this step (either successful or not)

<br />

### code snippets : 
use this line of code to init the transaction request :
```sh
   Zibal::init(
            $amount,
            'redirect',
            ['invoice' => $invoice_id],
            'discription',
            $invoice_id,
            $mobile,
            $allowedCards
        )->getResponse();
```

<br />

for redirecting the user to zibals gateway use :
   ```sh
   Zibal::redirect($trackId)->getResponse();
   ```
   
<br />

you may combine first and second step into one line of code like this :
   ```sh
   Zibal::init(
            $amount,
            'redirect',
            ['invoice' => $invoice_id],
            'discription',
            $invoice_id,
            $mobile,
            $allowedCards
        )->validate()->redirect();
   ```
   
<br />

finally you can use this line of code to verify the transaction status :
   ```sh
   Zibal::verify($trackId)->validate()->getResponse();
   ```
   
<br />

<br />

<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

<br />

<br />

<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.

<br />

<br />

<!-- CONTACT -->
## Contact

Abbas mkhzomi - [Telegram@llabbasmkhll](https://t.me/llabbasmkhll) - llabbasmkhll@gmail.com

Project Link: [https://github.com/llabbasmkhll/laravel-zibal](https://github.com/llabbasmkhll/laravel-zibal)



# Laravel Notes

## Installation

You can install the package via composer:

```
composer require dutchcodingcompany/laravel-notes
```

Then publish the package migrations, configuration files and resources.

```
php artisan vendor:publish --provider=DutchCodingCompany\Notes\NoteServiceProvider
```

Then execute the migrations.

```
php artisan migrate
```

## Configuration

You may change the note model that is used by changing the `table` or `model` in the `notes.php` config.

```
'table' => 'notes',

'model' => \App\Models\Note::class,
```

## Usage

Add the `HasNotes` interface and trait to the model.

```php
use DutchCodingCompany\Notes\Concerns\HasNotes;
use DutchCodingCompany\Notes\Contracts\HasNotes as HasNotesContract;

class Post extends Model implements HasNotesContract
{
    use HasNotes;
    
    // ...
}
```

## Credits

- [Bjorn Voesten](https://github.com/bjornvoesten)
- [Dutch Coding Company](https://github.com/dutchcodingcompany)
- [All contributors](https://github.com/dutchcodingcompany/csv-collection/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.






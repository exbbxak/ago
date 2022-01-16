[![Build Status](https://img.shields.io/endpoint.svg?url=https%3A%2F%2Factions-badge.atrox.dev%2FSerhiiCho%2Fago%2Fbadge&style=flat)](https://actions-badge.atrox.dev/SerhiiCho/ago/goto)
[![Latest Stable Version](https://poser.pugx.org/serhii/ago/v/stable)](https://packagist.org/packages/serhii/ago)
[![Total Downloads](https://poser.pugx.org/serhii/ago/downloads)](https://packagist.org/packages/serhii/ago)
[![License](https://poser.pugx.org/serhii/ago/license)](https://packagist.org/packages/serhii/ago)
<a href="https://php.net/" rel="nofollow"><img src="https://camo.githubusercontent.com/2b1ed18c21257b0a1e6b8568010e6e8f3636e6d5/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f7068702d253345253344253230372e312d3838393242462e7376673f7374796c653d666c61742d737175617265" alt="Minimum PHP Version" data-canonical-src="https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg" style="max-width:100%;"></a>

- [✏️ Description](#description)
- [🐘 Supported PHP versions](#supported-php-versions)
- [⚙️ Configurations](#configurations)
  - [Set language](#set-language)
  - [Overwrite translations](#overwrite-translations)
- [👏 Usage](#usage)
- [🚩 Supported languases](#supported-languages)
- [🤲 Options](#options)
- [🚀 Quick start](#quick-start)
- [🗒 Release Notes](https://github.com/SerhiiCho/ago/blob/master/CHANGELOG.md)
- [🎁 Contributing a language in 4 steps](https://github.com/SerhiiCho/ago/blob/master/CONTRIBUTE.md)
  - [1️⃣ Step. Adding translation](https://github.com/SerhiiCho/ago/blob/master/CONTRIBUTE.md#1-step-adding-translation)
  - [2️⃣ Step. Adding rules](https://github.com/SerhiiCho/ago/blob/master/CONTRIBUTE.md#2-step-adding-rules)
  - [3️⃣ Step. Adding tests](https://github.com/SerhiiCho/ago/blob/master/CONTRIBUTE.md#3-step-adding-tests)
  - [4️⃣ Step. Add 1 line to README.md file](https://github.com/SerhiiCho/ago/blob/master/CONTRIBUTE.md#4-step-add-1-line-to-readmemd-file)

## Description

Date/time converter into "n time ago" format that supports multiple languages. You can contribute any language that you wish easily by creating a pull request. I would gladly merge it in if you follow the simple steps.

This package is well tested, optimized and already used in many production apps. It has shown itself pretty well. If you find any issues or bugs 🐞, please create an [issue](https://github.com/SerhiiCho/ago/issues/new), and I'll fix it as soon as I can.

## Supported PHP versions

- ✅ 7.1
- ✅ 7.2
- ✅ 7.3
- ✅ 7.4
- ✅ 8.0
- ✅ 8.1

## Configurations

### Set language

Default language is English. Optionally you can set the language in your application by calling `set()` method and passing a flag `ru` for Russian or `en` for English language. You can see supported languages in the next section.

```php
Serhii\Ago\Lang::set('ru');
```

#### Supported languages

| Flag | Language | Short representation |
| --- | --- | --- |
| 🇬🇧 | English | en |
| 🇷🇺 | Russian | ru |
| 🇺🇦 | Ukrainian | uk |

### Overwrite translations
There are cases when you want to replace certain words with specific ones. You can do it with “Overwrites”. All you need to do is just to pass `array<string, string>` of values that you want to overwrite.

For example, instead of `1 minute ago` you want to have the output `1 minute before`. To achieve that, create `['ago' => 'before']` array and pass it as the second argument to method `set()` in `Serhii\Ago\Lang` class.

```php
Lang::set('en', [
    'ago' => 'before',
    'day' => 'Day',
    'days' => 'Days',
]);
```

> The list of all default key values you can find in [resources/lang](https://github.com/SerhiiCho/ago/tree/master/resources/lang) directory.

## Usage

For outputting post publishing date or something else you can just pass the date to method `trans()`. It will count the interval between now and given date and returns needed format. Internally given date will be parsed by `strtotime()` PHP's internal function.

```php
use Serhii\Ago\TimeAgo;

TimeAgo::trans('now - 10 seconds'); // output: 10 seconds ago
```

## Options

As the seconds argument `trans` method excepts array of options or single option. Here is an example of passed options.

```php
use Serhii\Ago\Option;
use Serhii\Ago\TimeAgo;

TimeAgo::trans('yesterday'); // output: 1 day ago
TimeAgo::trans('yesterday', Option::NO_SUFFIX); // output: 1 day
TimeAgo::trans('now', Option::ONLINE); // output: online
TimeAgo::trans('now', [Option::ONLINE, Option::UPPER]); // output: ONLINE
```

#### Available options

All options are available in `Serhii\Ago\Option::class` as constants.

| Option | Description |
| --- | --- |
| Option::ONLINE | Display "Online" if date interval within 60 seconds. After 60 seconds output will be the same as usually "x time ago" format. |
| Option::NO_SUFFIX | Remove suffix from date and have "5 minutes" instead of "5 minutes ago". |
| Option::UPCOMING | This option reverts the output and calculates period not from the past date but to future date. It is useful when you need to display a counter for some date in the future. If you pass a date that is 2 months in the future, the output will be `2 months`. |
| Option::UPPER | Set the output to uppercase. |

## Quick Start

```bash
composer require serhii/ago
```

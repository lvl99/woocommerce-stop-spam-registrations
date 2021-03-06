# LVL99 WooCommerce Stop Spam Registrations

v0.1.0

By Matt Scheurich <matt@lvl99.com>

A small plugin designed to stop automated bots from registering customer accounts on your WooCommerce shop.

This plugin implements a honeypot method to trick bots from registering to your site.

In the future (if necessary) this plugin may incorporate other techniques, such as using visible human-validation fields
like captcha or simple addition. For the moment, let's see how the honeypot works...


## Installation

### ZIP

You can download the ZIP file here to upload to your WordPress plugins folder:
 - https://github.com/lvl99/woocommerce-stop-spam-registrations/archive/master.zip
 
Once the plugin is uploaded to your server, you'll need to activate the plugin. When the plugin is activated then the
trap is set and ready!


### Composer

You can use composer to reference the version from git. You will need to add a custom package repository in your
WordPress project's composer file:

```json
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/lvl99/woocommerce-stop-spam-registrations"
  }
]
```

Then you can require the plugin into your project:

```bash
  $ composer require lvl99/woocommerce-stop-spam-registrations
```


## [Changelog](CHANGELOG.md)


## Licence

[MIT](LICENSE.md)

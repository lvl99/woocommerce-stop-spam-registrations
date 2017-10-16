# LVL99 WooCommerce Stop Spam Registrations

v0.1.0

By Matt Scheurich <matt@lvl99.com>

A small plugin designed to stop automated bots from registering customer accounts on your WooCommerce shop.

This plugin implements a honeypot method to trick bots from registering to your site.

In the future (if necessary) this plugin may incorporate other techniques, such as using visible human-validation fields
like captcha or simple addition. For the moment, let's see how the honeypot works...

## Installation

You can use composer to reference the version from git. You will need to add a package in your WordPress project's
composer file:

```json
"packages": {
  {
    "type": "vcs",
    "url": ""
  }
}
```

```bash
  $ composer require lvl99/woocommerce-stop-spam-registrations
```

# PHP Teamwork Chat - Webhook
A PHP wrapper to send messages to Teamwork Chat.

## Installation

Alter your composer.json file like so:


    "repositories": [
        ...
        {
          "type": "package",
          "package": {
            "name": "satellitewp/php-teamwork-chat",
            "version": "1.0.0",
            "type": "library",
            "source": {
              "url": "https://github.com/SatelliteWP/php-teamwork-chat",
              "type": "git",
              "reference": "master"
            }
          }
        }
      ],
      "require": {
        ...,
        "satellitewp/php-teamwork-chat": "^1",
      }


Install the library by running composer:

    composer install

That's it! You are ready to use the library. Inside your PHP file:

    require_once __DIR__ . '/vendor/autoload.php';
  
    $webhook = new \SatelliteWP\Teamwork\Chat\Webhook('https://chat-hooks.us.teamwork.com/v1/in/yyyy/xxxxxxxx-2a87-4cb5-93c3-zzzzzzzzzz');
    $webhook->sendMessage('It works!');

## References

- [Incoming Hooks](https://developer.teamwork.com/guides/teamwork-chat-incoming-hooks/)
- [Post data using Incoming Hooks](https://developer.teamwork.com/guides/teamwork-chat-incoming-hooks/post-data-using-incoming-hooks/)

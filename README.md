# PHP Teamwork Chat - Webhook
A PHP wrapper to send messages to Teamwork Chat.

## Installation

To install the package, simply run:

    composer require satellitewp/php-teamwork-chat

That's it! You are ready to use the library.


## Usage

Inside your PHP file:

    require_once __DIR__ . '/vendor/autoload.php';
  
    $webhook = new \SatelliteWP\Teamwork\Chat\Webhook('https://chat-hooks.us.teamwork.com/v1/in/yyyy/xxxxxxxx-2a87-4cb5-93c3-zzzzzzzzzz');
    $webhook->sendMessage('It works!');


## Contributors

The configuration was created and is maintained by [SatelliteWP](https://www.satellitewp.com/en/?utm_source=php-teamwork-chat).


## References

- [Incoming Hooks](https://developer.teamwork.com/guides/teamwork-chat-incoming-hooks/)
- [Post data using Incoming Hooks](https://developer.teamwork.com/guides/teamwork-chat-incoming-hooks/post-data-using-incoming-hooks/)


## License
Released under the MIT License. See the license file for details.

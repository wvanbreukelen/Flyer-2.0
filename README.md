Flyer
=========

A simple to use PHP framework!

### Notes
* This framework uses the MVC pattern
* This framework is in development, expect some (major) bugs
* This framework is inspired by Laravel

### Installation

NOTE: The following changes could be outdated! For better documentation, visit the wiki section.

It's very easy to install the Flyer Framework!
Steps:

1. Clone this repository, the master or alpha branch.
2. Open a command window (Terminal, CMD, etc.) and type
```bash
composer update
```
This will install the required dependencies and generate the autoload files
3. Done, enjoy!

### Views

Please check the link here to see how you can implement your views easier in your own application, using View compilers.

### Create your own packages

It's easy to modify this framework at your own needs. First, you have to create a new folder in the "flyer" folder (First letter, in uppercase)!
Then your create a ServiceProvider for your package, the ServiceProvider is the glue between your package's code and the framework.
It has to contain the register() method.

In the register() method you specify what the framework should do if it loads your package, by example your create your instances that your package needs.
Also it is possible to access the App instance of communitating with some existing packages/methods (Example: the Database instance)

It's possible to create a boot() method in your ServiceProvider. In your boot method you put your things that have to been executed if the App boot()
method is fired.

### Contributing

You are free to contribute, as long you stick to the Symfony rules. 
Please create a pull request and I will take a look at it.

### Questions

If you have any questions, feel free to contact me!







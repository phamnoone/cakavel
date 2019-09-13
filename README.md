```
├── app
├── config                    # Configuration directory
│   │   ├── database.php          
│   │   └── session.php    
│   │                        # Main MVC file structure directory
│   ├── controllers               # Controllers directory
│   │   └── example.php           # Example Controller with functionality explanation
│   ├── models                    # Models directory
│   │   └── example.php           # Example Model with functionality explanation
│   └── views                     # Views directory, views are recommended in pure html, possible <?=$variable?> additions
├── core                          # Basically mvc engine directory, *don't edit file in this folder*
│   ├── app.php                   # Main framework file  (Router file)
│   ├── classes                   # Parent classes directory for extends
│   │   ├── controller.php        
│   │   └── model.php             
├── index.php                     # Endpoint url
├── public                        # Directory for all public resources, javascript files, stylesheets and vendor plugins
│   ├── javascripts               # Javascript files     
│   ├── stylesheets               # Javascript files
│   └── vendor                    
└── .htaccess                     # htaccess rewriting all of requests to MVC endpoint /index.php
```

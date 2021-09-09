## Installation

- Copy ***.env.example*** to ***.env*** and fill the correct details.
- Run ***composer install***.
- Run ***php artisan key:generate***.
- Run ***php artisan migrate***.
- Open ***redis for caching***.

## API GUIDELINES 

- Use *** api/v1/register *** for register user endpoint and provides a token for new registered user.
	Payload example :
		(string) name : "Test",
		(string) email : "test@test.com",
		(string) password : "password",
		(string) password_confirmation : "password"


- Use *** api/v1/login *** for login enpoint or request a token for an existing user.
	Payload example :
		(string) email : "test@test.com",
		(string) password : "password"


- Use *** /api/v1/github/accounts *** for requesting an information of github account by username.
	parameter:
		(array) usernames

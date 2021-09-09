## Installation

- Copy ***.env.example*** to ***.env*** and fill the correct details.
- Run ***composer install***.
- Run ***php artisan key:generate***.
- Run ***php artisan migrate***.

## API GUIDELINES 

- Use *** api/v1/register *** for register user endpoint and provides a token for new registered user.
	Payload example :
		name : "Test",
		email : "test@test.com",
		password : "password",
		password_confirmation : "password"

	sample response:
		{
		    "status": "Success",
		    "description": "Created",
		    "data": {
		        "user": {
		            "name": "Test",
		            "email": "test@test.com",
		            "updated_at": "2021-09-09T01:48:28.000000Z",
		            "created_at": "2021-09-09T01:48:28.000000Z",
		            "id": 1
		        },
		        "token": "1|JAsIGqTlqXDiZ8eDmIlHEqHd6TZCUPUpAvogCizR"
		    }
		}


- Use *** api/v1/login *** for login enpoint or request a token for an existing user.
	Payload example :
		email : "test@test.com",
		password : "password"


	sample response:
		{
		    "status": "Success",
		    "description": "Created",
		    "data": {
		        "user": {
		            "name": "Test",
		            "email": "test@test.com",
		            "updated_at": "2021-09-09T01:48:28.000000Z",
		            "created_at": "2021-09-09T01:48:28.000000Z",
		            "id": 1
		        },
		        "token": "2|JAsIGqTlqXDiZ8eDmIlHEqHd6TZCUPUpAvogCizR"
		    }
		}
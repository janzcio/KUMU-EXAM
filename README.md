## Installation

- Copy ***.env.example*** to ***.env*** and fill the correct details.
- Run ***composer install***.
- Run ***php artisan key:generate***.
- Run ***php artisan migrate***.
- Open ***redis for caching***.

## API GUIDELINES 

### POST api/v1/register
register user endpoint and provides a token for new registered user.
- Payload example :


		name : "Test"
		email : "test@test.com"
		password : "password"
		password_confirmation : "password"


- Sample Response

        {
            "status": "Success",
            "description": "Created",
            "data": {
                "user": {
                    "name": "Test",
                    "email": "test@test.com",
                    "updated_at": "2021-09-09T07:31:55.000000Z",
                    "created_at": "2021-09-09T07:31:55.000000Z",
                    "id": 5
                },
                "token": "29|xGfDw42Dg70YewuRfUDVUWFIQVIV8DsIAGjJvb3Y"
            }
        }


### POST api/v1/login
Authenticate the user using their existing credential.
- Payload example :


		email : "test@test.com"
		password : "password"


- Sample Response

        {
		    "status": "Success",
		    "description": "Created",
		    "data": {
		        "user": {
		            "id": 5,
		            "name": "Test",
		            "email": "test@test.com",
		            "email_verified_at": null,
		            "created_at": "2021-09-09T07:31:55.000000Z",
		            "updated_at": "2021-09-09T07:31:55.000000Z"
		        },
		        "token": "30|RH4ue1yDzQLFg0TNisUCEJwNHYj0HbpEJpBFZ7D3"
		    }
		}


### GET api/v1/github/accounts
Request an information of github account by usernames.
- Parameter example :

		usernames[0] :  "test"
		usernames[1] :  "test1"

- Sample Response

        {
		    "status": "Success",
		    "description": "OK",
		    "data": [
		        {
		            "name": "Test",
		            "login": "test",
		            "company": null,
		            "number_of_followers": 0,
		            "number_of_public_repositories": 8,
		            "average_number_of_followers_per_public_repository": 0,
		            "cache_hit_indicator": "github"
		        },
		        {
		            "name": "Test1",
		            "login": "test1",
		            "company": null,
		            "number_of_followers": 1,
		            "number_of_public_repositories": 22,
		            "average_number_of_followers_per_public_repository": 0.045454545454545456,
		            "cache_hit_indicator": "github"
		        }
		    ]
		}



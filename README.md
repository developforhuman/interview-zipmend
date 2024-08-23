# Project README

## Environment Configuration

You can find the required environment data in the `env-example` file. Please make sure to copy this file to `.env` and update the environment variables as needed.

## API Instructions

To test the API, use the following instructions for making requests:

### Endpoint

**POST** `/api/calculate-price`

### Headers

- **Accept**: `application/json`
- **Authorization**: `5h7EbNu0sDqXtJWigpzlcijatgymO8qn`
- **Content-Length**: `244`
- **Content-Type**: `application/json`
- **Host**: `transportapi.test`
- **User-Agent**: `HTTPie`

### Request Body

```json
{
    "addresses": [
        {
            "country": "DE",
            "zip": "10115",
            "city": "Berlin"
        },
        {
            "country": "DE",
            "zip": "20095",
            "city": "Hamburg"
        }
    ] 
}

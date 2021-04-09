# Genre API DOCS

# Base URL
http://localhost

# Other resources 

 
# Headers

Authorization: key your token

Accept : application/json

# API 

| Route                        | Request Method | Parameters | Response  |
| -----------                  | -----------    |----------- |---------- |
| /api/admin/genres            | POST           |  [Create Parmaters](#Create)|[Response](#Response)|
| /api/admin/genres | GET           |-|  [Response](#Response)         |
|/api/admin/genres/{id}         | GET           |  - |  [Response](#Response)         |
|/api/admin/genres/{id}        |PUT           |  [Update Parmaters](#Update)|[Response](#Response)     |
|/api/admin/genres/{id}        |DELETE           |  -|[Response](#Response)| 
|/api/genres        |GET           |-| [Response](#Response)|
|/api/genres/{id}        |GET           |-|[Response](#Response)|


# <a name="Create"> </a> Create new Genre 

```json
{
"original_id" : "String"
"name" : "String"
} 
```

# <a name="Update"> </a> Update Genre

```json
{
"original_id" : "String"
"name" : "String"
} 
```
# <a name="Response"> </a> Responses 

## Unauthorized error

__*Response code : 401*__
```json 
{
    "message" : "Unauthenticated"
}
```

## Validation error 
__*Response code : 422*__

```json 
{
    "errors" {
        "Key" : "Error message"
    }
}
```
## Success  
__*Response code : 200*__
```json 
{
    "records" [
        {

        },
    ]
}
```

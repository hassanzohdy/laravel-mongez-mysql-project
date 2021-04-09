# Movie API DOCS

# Base URL
http://localhost

# Other resources
[Genre](./genre.md) 

 
# Headers

Authorization: key your token

Accept : application/json

# API 

| Route                        | Request Method | Parameters | Response  |
| -----------                  | -----------    |----------- |---------- |
| /api/admin/movies            | POST           |  [Create Parmaters](#Create)|[Response](#Response)|
| /api/admin/movies | GET           |-|  [Response](#Response)         |
|/api/admin/movies/{id}         | GET           |  - |  [Response](#Response)         |
|/api/admin/movies/{id}        |PUT           |  [Update Parmaters](#Update)|[Response](#Response)     |
|/api/admin/movies/{id}        |DELETE           |  -|[Response](#Response)| 
|/api/movies        |GET           |-| [Response](#Response)|
|/api/movies/{id}        |GET           |-|[Response](#Response)|


# <a name="Create"> </a> Create new Movie 

```json
{
"original_language" : "String"
"original_title" : "String"
"backdrop_path" : "String"
"overview" : "String"
"release_date" : "String"
"title" : "String"
"popularity" : "Float"
"vote_average" : "Float"
"adult" : "Bool"
"video" : "Bool"
"vote_count" : "Int"
"original_id" : "Int"
} 
```

# <a name="Update"> </a> Update Movie

```json
{
"original_language" : "String"
"original_title" : "String"
"backdrop_path" : "String"
"overview" : "String"
"release_date" : "String"
"title" : "String"
"popularity" : "Float"
"vote_average" : "Float"
"adult" : "Bool"
"video" : "Bool"
"vote_count" : "Int"
"original_id" : "Int"
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

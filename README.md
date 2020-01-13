# How to create a GraphQL Endpoint for Magento 2.3

In this Magento 2 GraphQL module, I will show how to build a GraphQL API endpoint extend them with a custom filter logic. 

## Test for your new Endpoint (Client Sample Call)

I recommend as Testing client tool to use Altair GraphQL Client

If you like Postman here you a tutorial how to us it: https://learning.getpostman.com/docs/postman/sending-api-requests/graphql/

### Simple GraphQL-Query without an filter:

```sql
{
  testGraph {
    total_count
    items {
      name
      description
    }
  }
}
```

### GraphQL-Query with an filter:

```sql
{
  testGraph(
    filter: {      
      name: {
          eq: "Brick and Mortar 2"
        }
    	}    
  ) {
    total_count
    items {
      name
      description
    }
  }
}
```

### GraphQL-Query with an filter and change page size:

```sql
{
  testGraph(
    filter: {      
      name: {
        like: "Brick and Mortar 1%"
      }
    },
    pageSize: 100,
    currentPage: 1
  ) {
    total_count
    items {
      name
      description
    }
  }
}
```

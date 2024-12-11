# ForTask
#Product
# GET request
http://127.0.0.1:8000/api/index-product
#Response
    {
        "id": 1,
        "name": "Shim",
        "code": "Sh001",
        "created_at": "2024-12-11T06:02:09.000000Z",
        "updated_at": "2024-12-11T06:02:09.000000Z"
    },
    {
        "id": 2,
        "name": "Koylak",
        "code": "K001",
        "created_at": "2024-12-11T06:02:27.000000Z",
        "updated_at": "2024-12-11T06:02:27.000000Z"
    }

#POST request
http://127.0.0.1:8000/api/create-product
{
    "name":"Koylak",
    "code":"K001"
}
#Response
 {
        "name": "Koylak",
        "code": "K001",
        "updated_at": "2024-12-11T06:02:27.000000Z",
        "created_at": "2024-12-11T06:02:27.000000Z",
        "id": 2
    },
201

#Material

#GET request
http://127.0.0.1:8000/api/index-material
#response 
 {
        "id": 1,
        "name": "Mato",
        "created_at": "2024-12-11T06:02:45.000000Z",
        "updated_at": "2024-12-11T06:02:45.000000Z"
    },
    {
        "id": 2,
        "name": "Zamok",
        "created_at": "2024-12-11T06:02:53.000000Z",
        "updated_at": "2024-12-11T06:02:53.000000Z"
    },
    {
        "id": 3,
        "name": "Mato",
        "created_at": "2024-12-11T06:03:01.000000Z",
        "updated_at": "2024-12-11T06:03:01.000000Z"
    },
    {
        "id": 4,
        "name": "Tugma",
        "created_at": "2024-12-11T06:03:07.000000Z",
        "updated_at": "2024-12-11T06:03:07.000000Z"
    },
    {
        "id": 5,
        "name": "Ip",
        "created_at": "2024-12-11T06:03:14.000000Z",
        "updated_at": "2024-12-11T06:03:14.000000Z"
    }


#POST request
http://127.0.0.1:8000/api/create-material
{
    "name":"Ip"
}


#Warehouse
#GET response
http://127.0.0.1:8000/api/index-warehouse
{
        "id": 1,
        "material_id": 1,
        "remainder": 800,
        "price": "1500.00",
        "created_at": "2024-12-11T06:05:17.000000Z",
        "updated_at": "2024-12-11T06:05:17.000000Z"
    },
    {
        "id": 2,
        "material_id": 2,
        "remainder": 1000,
        "price": "2000.00",
        "created_at": "2024-12-11T06:05:51.000000Z",
        "updated_at": "2024-12-11T06:05:51.000000Z"
    },
    {
        "id": 3,
        "material_id": 3,
        "remainder": 200,
        "price": "1600.00",
        "created_at": "2024-12-11T06:06:32.000000Z",
        "updated_at": "2024-12-11T06:06:32.000000Z"
    },
    {
        "id": 4,
        "material_id": 4,
        "remainder": 500,
        "price": "300.00",
        "created_at": "2024-12-11T06:07:07.000000Z",
        "updated_at": "2024-12-11T06:07:07.000000Z"
    },
    {
        "id": 5,
        "material_id": 5,
        "remainder": 700,
        "price": "500.00",
        "created_at": "2024-12-11T06:08:24.000000Z",
        "updated_at": "2024-12-11T06:08:24.000000Z"
    },
    {
        "id": 6,
        "material_id": 6,
        "remainder": 500,
        "price": "550.00",
        "created_at": "2024-12-11T06:08:56.000000Z",
        "updated_at": "2024-12-11T06:08:56.000000Z"
    }

#POST request
{
    "material_id":6,
    "remainder":500,
    "price":550
}

#ProductMaterials

#Post request
http://127.0.0.1:8000/api/calculate-materials
{

    "products":[
        {
            "name":"koylak",
            "quantity":39,
            "materials":[
                {
                    "material_id":1,
                    "quantity":50
                },
                {
                    "material_id":2,
                    "quantity":39
                },
                {
                    "material_id":3,
                    "quantity":50
                },
                {
                    "material_id":4,
                    "quantity":400
                }
            ]
        },
        {
            "name":"Shim",
            "quantity":20,
            "materials":[
                {
                    "material_id":1,
                    "quantity":50
                },
                {
                    "material_id":2,
                    "quantity":20
                },
                {
                    "material_id":3,
                    "quantity":20
                },
                {
                    "material_id":4,
                    "quantity":400
                }
            ]
        },
        {
            "name":"Kurtka",
            "quantity":28,
            "materials":[
                {
                    "material_id":1,
                    "quantity":29
                },
                {
                    "material_id":2,
                    "quantity":28
                },
                {
                    "material_id":4,
                    "quantity":1000
                }
            ]
        }
    ]
}

#response
{
    "result": [
    
        {
            "product_name": "koylak",
            "product_qty": 39,
            "product_materials": [
                [
                    {
                        "warehouse_id": 1,
                        "material_name": "Mato",
                        "qty": 800,
                        "price": "1500.00"
                    },
                    {
                        "warehouse_id": null,
                        "material_name": "Mato",
                        "qty": 1150,
                        "price": null
                    }
                ],
                [
                    {
                        "warehouse_id": 2,
                        "material_name": "Zamok",
                        "qty": 1000,
                        "price": "2000.00"
                    },
                    {
                        "warehouse_id": null,
                        "material_name": "Zamok",
                        "qty": 521,
                        "price": null
                    }
                ],
                [
                    {
                        "warehouse_id": 3,
                        "material_name": "Mato",
                        "qty": 200,
                        "price": "1600.00"
                    },
                    {
                        "warehouse_id": null,
                        "material_name": "Mato",
                        "qty": 1750,
                        "price": null
                    }
                ],
                [
                    {
                        "warehouse_id": 4,
                        "material_name": "Tugma",
                        "qty": 500,
                        "price": "300.00"
                    },
                    {
                        "warehouse_id": null,
                        "material_name": "Tugma",
                        "qty": 15100,
                        "price": null
                    }
                ]
            ]
        },
        {
            "product_name": "Shim",
            "product_qty": 20,
            "product_materials": [
                [
                    {
                        "warehouse_id": 1,
                        "material_name": "Mato",
                        "qty": 800,
                        "price": "1500.00"
                    },
                    {
                        "warehouse_id": null,
                        "material_name": "Mato",
                        "qty": 200,
                        "price": null
                    }
                ],
                [
                    {
                        "warehouse_id": 2,
                        "material_name": "Zamok",
                        "qty": 400,
                        "price": "2000.00"
                    }
                ],
                [
                    {
                        "warehouse_id": 3,
                        "material_name": "Mato",
                        "qty": 200,
                        "price": "1600.00"
                    },
                    {
                        "warehouse_id": null,
                        "material_name": "Mato",
                        "qty": 200,
                        "price": null
                    }
                ],
                [
                    {
                        "warehouse_id": 4,
                        "material_name": "Tugma",
                        "qty": 500,
                        "price": "300.00"
                    },
                    {
                        "warehouse_id": null,
                        "material_name": "Tugma",
                        "qty": 7500,
                        "price": null
                    }
                ]
            ]
        },
        {
            "product_name": "Kurtka",
            "product_qty": 28,
            "product_materials": [
                [
                    {
                        "warehouse_id": 1,
                        "material_name": "Mato",
                        "qty": 800,
                        "price": "1500.00"
                    },
                    {
                        "warehouse_id": null,
                        "material_name": "Mato",
                        "qty": 12,
                        "price": null
                    }
                ],
                [
                    {
                        "warehouse_id": 2,
                        "material_name": "Zamok",
                        "qty": 784,
                        "price": "2000.00"
                    }
                ],
                [
                    {
                        "warehouse_id": 4,
                        "material_name": "Tugma",
                        "qty": 500,
                        "price": "300.00"
                    },
                    {
                        "warehouse_id": null,
                        "material_name": "Tugma",
                        "qty": 27500,
                        "price": null
                    }
                ]
            ]
        }
    ]
}






    

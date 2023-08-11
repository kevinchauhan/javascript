<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body onload='getData()'>
<h1 class="text-center">CRUD OPERATION WITH PHP</h1>
<h4 class="text-center">db name : user_data</h4>
<h4 class="text-center">table name : user</h4>
    <div class="mx-auto my-3 col-6 border p-3 rounded">
        <form action="" name=form>
            <input class="form-control" name='uid' id="user-name" type="hidden" placeholder="id" disabled>
        <div class="mb-2">
            <label for="">Name</label>
            <input class="form-control" name='name' id="user-name" type="text" placeholder="name">
        </div>
        <div class="mb-2">
            <label for="">Email</label>
            <input class="form-control" name='email' id="user-email" type="text" placeholder="email">
        </div>
        <div class="mb-2">
            <label for="">Address</label>
            <input class="form-control" name='address' id="user-add" type="text" placeholder="address">
        </div>
        <div class="text-center mt-3">
            <button class="btn btn-success" id="add-btn">Save</button>
        </div>
        </form>
    </div>
    <div class="list p-3">
        <table class="table table-bordered rounded rounded-3">
            <thead class="bg-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <!-- data will be display dynamically inside tbody -->
            <tbody id="user-data-list">

            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script> 
        
        // getting data
        function getData(){
            xhrRequest('GET','function.php?sel=1').then((res)=> display(res))
            // console.log('getting...')
            // $document.ready(()=>{
            //     alert()
            // })
            // $.ajax({
            //     url: "function.php",
            //     data: {del:1,id:},
            //     dataType: 'json/html'
            //     method: 'GET',
            //     success:(res)=>{
            //         console.log(res)
            //         get
            //     }
            // })
        }

        // deleteing
        function deleteData(id){
            xhrRequest('GET',`function.php?del=1&id=${id}`).then((res)=>getData())
        }
 
        // inserting
        document.querySelector('form').addEventListener('submit',(e)=>{
            e.preventDefault()
            
            const form = e.target

            const formData = new FormData();
            formData.append('name', form.name.value);
            formData.append('email', form.email.value);
            formData.append('address', form.address.value);

            if(form.id === 'update'){
                formData.append('upd', 1);
                formData.append('uid', form.uid.value);

                xhrRequest('POST','function.php',formData).then((res)=>getData())
                
                form.id = 'insert'
                document.querySelector('#add-btn').innerText = 'Save'
                
            } else{
                formData.append('ins', 1);
                xhrRequest('POST','function.php',formData).then((res)=>getData())
            }

            
            form.uid.value = ''
            form.name.value = ''
            form.email.value = ''
            form.address.value = ''
    
        })
    
        // edit
        function editData(id){
            xhrRequest('GET',`function.php?eid=1&id=${id}`).then((res)=>{
  
                const form = document.form
                const btn = document.querySelector('#add-btn')
                
                form.uid.value = res.id
                form.name.value = res.name
                form.email.value = res.email
                form.address.value = res.address
                form.id = 'update'
                btn.innerText = 'Update'

            })
        }

        // sending AJAX requests...
        function xhrRequest(method,url,data=null){

            return new Promise((resolve,reject)=>{

                const http = new XMLHttpRequest()

                http.open(method.toUpperCase(),url)
                
                http.addEventListener('load',(e)=>{
                const res = JSON.parse(e.target.response)
                    resolve(res)
                })

                http.send(data)
            })
        } 

        // displaying data
        function display(res){
            let temp = ''
            res.forEach((e)=>{
                temp += `<tr>
                            <td>${e.name}</td>
                            <td>${e.email}</td>
                            <td>${e.address}</td>
                            <td><button class='btn btn-warning btn-sm' onclick='editData(${e.id})'>Edit</button>
                            <button class='btn btn-danger btn-sm' onclick='deleteData(${e.id})'>Delete</button></td>
                        </tr>`
            })
            document.querySelector('tbody').innerHTML = temp
        }
        
    </script>
</body>
</html>
<!DOCTYPE html>
   <html lang="fr">
      <head>
         <meta charset="utf-8">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
         <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
         <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
         <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
         <title>Adele</title>
      </head>
      <body>
        <h1>Tableau de présentation</h1>
        <table id="users" class="display">
            <thead>
                <tr>
                    <th scope="col">Identifiant</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <form id="addUserForm">
            <div class="form-group row">
                <label for="inputNom" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputNom" name="name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputEmail" name="email" required>
                </div>
            </div>
            <div class="form-group row">
                <span class="col-sm-2"></span>
                <div class="col-sm-2">
                    <button type="button" id="submitBtn" class="btn btn-primary form-control">Ajouter</button>
                </div>
            </div>
        </form>
        <script>
            $(document).ready(function () {
               let table = $('#users').DataTable({
                  ajax: {
                     url: 'http://localhost/IDAW/tp5/exo2/api.php',
                     dataSrc: '',
                     dataType:'json'
                  },
                  columns: [
                     { data: 'id' },
                     { data: 'name' },
                     { data: 'email' },
                     {
                           data: null,
                           render: function (data, type, row) {
                              return `
                              <button type="button" class="btn btn-primary" onclick="modifyRow(${row.id})">Modify</button>
                              <button type="button" class="btn btn-danger" onclick="deleteRow(${row.id})" data-action="delete">Delete</button>
                              `;
                           }
                     }
                  ]
               });
            });
         </script>       
      </body>
   </html>
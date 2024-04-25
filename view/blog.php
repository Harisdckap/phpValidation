
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
  <style>
    /* List View */
    .table {
      border-collapse: collapse;
      width: 100%;
    }
    .table th,
    .table td {
      border: 2px solid #ddd;
      padding: 12px;
      text-align: left;
    }
    .table th {
      background-color: #f2f2f2;
    }
    /* Grid View */
    .grid-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
      padding: 20px;
    }
    .grid-item {
  border: 2px solid #ddd;
  padding: 12px;
  height: 300px; /* Set a fixed height for grid items */
  overflow: auto; /* Add overflow property for longer content */
}


    /* Styled Button */
    .button {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
      border-radius: 8px;
    }

    .button:hover {
      background-color: #45a049;
    }

    .container {
      display: flex;
      justify-content: space-around;
      align-items: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Blog</h1>
    <button class="button" onclick="toggleView()">List View</button>
  </div>
  <?php
  require 'blogFunction.php';
  $data = retrieve_data_from_database();
  ?>
  <!-- List View -->
  <table class="table" id="list-view">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Content</th>
        <th>Link</th>
        <th>Author</th>
        <th>Status</th>
        <th>Img</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $row): ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['title']; ?></td>
          <td><?php echo $row['content']; ?></td>
          <td><?php echo $row['link']; ?></td>
          <td><?php echo $row['authorColumns']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td><img src="data:image/jpeg;base64,<?php echo $row['img']; ?>" alt="Image" width="100"></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div class="grid-container" id="grid-view" style="display: none;">
    <?php foreach ($data as $row): ?>
      <div class="grid-item">
        <p><strong>Id:</strong> <?php echo $row['id']; ?></p>
        <p><strong>Title:</strong> <?php echo $row['title']; ?></p>
        <p><strong>Content:</strong> <?php echo $row['content']; ?></p>
        <p><strong>Link:</strong> <?php echo $row['link']; ?></p>
        <p><strong>Author:</strong> <?php echo $row['authorColumns']; ?></p>
        <p><strong>Status:</strong> <?php echo $row['status']; ?></p>
        <img src="data:image/jpeg;base64,<?php echo $row['img']; ?>" alt="Image" width="200">
      </div>
    <?php endforeach; ?>
  </div>

  <script>
    function toggleView() {
      var listView = document.getElementById("list-view");
      var gridView = document.getElementById("grid-view");
      var btn=document.querySelector(".button")
      
      if (listView.style.display === "none") {
        listView.style.display = "table";
        gridView.style.display = "none";
        btn.innerHTML = "List View";
      } else {
        listView.style.display = "none";
        gridView.style.display = "grid";
        btn.innerHTML = "Grid View";
      }
    }
  </script>
</body>
</html>


<table>
  <thead>
    <tr>
    <th>ID</th>
    <th>uu Id</th>
    <th>Nama Pengguna</th>
    <th>Title</th>
    <th>Deskripsi</th>
    <th>File</th>

    </tr>
  </thead>
  <tbody>
  @foreach($data_peserta as $u)
  <tr>
    <td>{{ $u->id }}</td>
    <td>{{ $u->uuid }}</td>
    <td>{{ $u->data_peserta['name']}}</td>
    <td>{{ $u->title }}</td>
    <td>{{ $u->description }}</td>
    <td>{{ $u->files['new_name'] }}</td>
  </tr>
  @endforeach
  </tbody>
</table>

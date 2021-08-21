<table>
  <thead>
    <tr>
    <th>ID</th>
    <th>Nama Peserta</th>
    <th>Title</th>
    <th>Deskripsi</th>
    <th>File</th>
    <th>Tanggal Upload</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data_peserta as $u)
  <tr>
    <td>{{ $u->id }}</td>
    <td>{{ $u->data_peserta['name']}}</td>
    <td>{{ $u->title }}</td>
    <td>{{ $u->description }}</td>
    <td>
      @if ($u->file_id == 0)
        <a target="_blank" href="{{ $u->url }}">Google Drive</a>
        @else
        {{ $u->files['new_name'] }}
      @endif
    </td>
    <td>{{ $u->created_at->format('F j, Y h:i a') }}</td>
  </tr>
  @endforeach
  </tbody>
</table>

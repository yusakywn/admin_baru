<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Exova Indonesia')
<img src="https://assets.exova.id/img/logo.png" class="logo" alt="Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

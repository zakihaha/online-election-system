<table>
    <thead>
        <tr>
            <th>Kelas</th>
            <th>Username</th>
        </tr>

        @foreach ($users as $user)
            <tr>
                <td>{{ $grade->year . $grade->major . $grade->subclass }}</td>
                <td>{{ $user->username }}</td>
            </tr>
        @endforeach
    </thead>
</table>

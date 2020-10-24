<div>

    <a href="{{ url("/topic/add") }}">Create topic</a>


    <h2>Topics</h2>
    <table border="0">
        @foreach($topics as $topic)
            <tr>
                <td>{{ $topic -> name }}</td>
                <td><a href="{{ url("/topic/edit/".$topic -> id) }}">Edit</a></td>
                <td><a href="{{ url("/quiz/".$topic -> id) }}">Quiz now</a></td>
            </tr>
        @endforeach


    </table>




</div>

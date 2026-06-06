
<!DOCTYPE html>
<html>
<head>
    <title>My Todo App</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial; background: #1a1a2e; color: white; min-height: 100vh; padding: 40px 20px; }
        .container { max-width: 600px; margin: 0 auto; }
        h1 { color: #e94560; margin-bottom: 24px; font-size: 2rem; }
        .form { display: flex; gap: 10px; margin-bottom: 30px; }
        .form input { flex: 1; padding: 12px; border-radius: 8px; border: none; background: #16213e; color: white; font-size: 16px; }
        .form button { padding: 12px 24px; background: #e94560; color: white; border: none; border-radius: 8px; cursor: pointer; font-size: 16px; }
        .form button:hover { background: #c73652; }
        .todo-item { display: flex; align-items: center; justify-content: space-between; background: #16213e; padding: 14px 18px; border-radius: 8px; margin-bottom: 10px; }
        .todo-title { font-size: 16px; }
        .todo-title.done { text-decoration: line-through; color: #666; }
        .actions { display: flex; gap: 8px; }
        .btn-done { padding: 6px 14px; background: #0f3460; color: white; border: none; border-radius: 6px; cursor: pointer; }
        .btn-done.completed { background: #2ecc71; }
        .btn-delete { padding: 6px 14px; background: #e94560; color: white; border: none; border-radius: 6px; cursor: pointer; }
        .empty { text-align: center; color: #666; margin-top: 40px; }
        .count { color: #a8a8b3; font-size: 14px; margin-bottom: 16px; }
    </style>
</head>
<body>
<div class="container">
    <h1>📝 My Todo App</h1>

    <form action="{{ route('todos.store') }}" method="POST" class="form">
        @csrf
        <input type="text" name="title" placeholder="Add a new task..." autofocus>
        <button type="submit">Add</button>
    </form>

    <p class="count">{{ $todos->count() }} task(s) total · {{ $todos->where('completed', true)->count() }} done</p>

    @forelse($todos as $todo)
    <div class="todo-item">
        <span class="todo-title {{ $todo->completed ? 'done' : '' }}">{{ $todo->title }}</span>
        <div class="actions">
            <form action="{{ route('todos.update', $todo) }}" method="POST">
                @csrf @method('PUT')
                <button type="submit" class="btn-done {{ $todo->completed ? 'completed' : '' }}">
                    {{ $todo->completed ? '✓ Done' : 'Mark Done' }}
                </button>
            </form>
            <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="btn-delete">Delete</button>
            </form>
        </div>
    </div>
    @empty
    <p class="empty">No tasks yet. Add one above!</p>
    @endforelse
</div>
</body>
</html>
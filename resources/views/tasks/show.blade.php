@extends('tasks.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">📄 Chi tiết công việc</h5>
                    <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-secondary">⬅ Quay lại</a>
                </div>
                <div class="card-body">
                    <h4 class="fw-bold mb-3">{{ $task->title }}</h4>
                    <p class="text-muted"><strong>Mô tả:</strong></p>
                    <p>{{ $task->description ?? 'Chưa có mô tả' }}</p>
                    <p><strong>Hạn chót:</strong>
                        <span class="badge bg-danger">{{ $task->due_date }}</span>
                    </p>
                    <p><strong>Trạng thái:</strong>
                        @switch($task->status)
                            @case(0)
                                <span class="badge bg-primary">Chưa bắt đầu</span>
                            @break

                            @case(1)
                                <span class="badge bg-warning">Đang làm</span>
                            @break

                            @case(2)
                                <span class="badge bg-success">Hoàn thành</span>
                            @break
                        @endswitch
                    </p>
                    <div class="mt-4 d-flex justify-content-end">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning me-2">✏️ Sửa</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;"
                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa task này không?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

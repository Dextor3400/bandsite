<x-admin-master>
    @section('title', 'User Profile')
    @section('content')
        <h1 class="h1">User Profile</h1>

        <div class="col-sm-6">
            <form method="POST" action="{{ route('admin.users.update',$user) }}" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-4">
                    <img width="200px" src="{{ $user->avatar }}" alt="">
                </div>
                <div class="form-group">
                    <input type="file" name="avatar" readonly>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"" value="{{ $user->username }}" readonly>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" readonly>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"" value="{{ $user->email }}" readonly>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"" value="" readonly>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"" value="" readonly>
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @endsection
</x-admin-master>

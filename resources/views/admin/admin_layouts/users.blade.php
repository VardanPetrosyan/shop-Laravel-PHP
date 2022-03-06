@extends('admin.admin')

@section('main')
<style>
    .dropbtn {
      background-color: #4CAF50;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }
    
    .dropdown {
      position: relative;
      display: inline-block;
    }
    
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
    
    .dropdown-content a:hover {background-color: #f1f1f1}
    
    .dropdown:hover .dropdown-content {
      display: block;
    }
    
    .dropdown:hover .dropbtn {
      background-color: #3e8e41;
    }
    form{
        margin: 10px
    }
    td{
        border: 1px solid;
    }
    th{
        border: 1px solid;
    }
    </style>
    <form action="">
        <table>
            <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Provaider User Id
                    </th>
                    <th>
                        Provaider
                    </th>
                    <th>
                        Role
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $value)
                
                 @if($value->id !== 1)
                    <tr>
                        <td>
                            {{$value->name}}
                        </td>
                        <td>
                            {{$value->email}}
                        </td>
                        <td>
                            {{$value->provaider_user_id}}
                        </td>
                        <td>
                            {{$value->provaider}} 
                        </td>
                        
                        <td>
                            <div class="dropdown">
                                <button class="dropbtn">ROLE</button>
                                <div class="dropdown-content">
                                    @foreach($roles as $role)
                                    <label for="{{$role->id}}">
                                    <input name="user_id" type="checkbox" value="{{$role->name}}" id="{{$value->id}}" onclick="post(this)"
                                    @foreach(Arr::pluck($value->roles->toArray(),'name') as $rol)
                                    @if($role->name == $rol)
                                    {{'checked'}}
                                    @endif
                                    @endforeach
                                    />{{$role->name}}</label>
                                    @endforeach
                                </div>
                              </div>
                        
                            {{-- <select name="select_role"id="{{$value->id}}" class="select_role" onChange="post(this)">
                                @foreach($roles as $role)
                                <option name="user_id"  value="{{$role->name}}" 
                                @if($role->name == last(Arr::pluck($value->roles->toArray(),'name')))
                                {{'selected=selected'}}
                                @endif
                                >{{$role->name}}</option>
                            @endforeach
                            </select> --}}
                        </td>
                    </tr>
                    @endif
                @empty
                
                <p>No users</p>

                @endforelse
            </tbody>
        </table>
    </form>
    <script>
        
    function post(select){
      var role_name = select.value;
      var user_id = select.id;
      
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        type: "POST",
        url: "{{route('editrole')}}",
        data: {_token: '{!! csrf_token() !!}',id:user_id,name: role_name,checkbox:select.checked},
        datatype: 'JSON',
        success: function (response,statusText) {
                    if (statusText == 'success') {
                        console.log(response)
                      } else {
                        alert('error');
                      }
                },
                error: function (response) {
                    
                }
      });
    }
    </script>
@endsection

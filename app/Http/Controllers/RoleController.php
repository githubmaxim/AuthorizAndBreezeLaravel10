<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Role::class);

        return Role::all();
    }

    public function store(RoleRequest $request)
    {
        $this->authorize('create', Role::class);

        return Role::create($request->validated());
    }

    public function show(Role $role)
    {
        $this->authorize('view', $role);

        return $role;
    }

    public function update(RoleRequest $request, Role $role)
    {
        $this->authorize('update', $role);

        $role->update($request->validated());

        return $role;
    }

    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        $role->delete();

        return response()->json();
    }
}

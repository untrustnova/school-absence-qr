<?php

namespace App\Traits;

use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasRoles
{
    /**
     * The roles that belong to the user.
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Assign a role to the user.
     */
    public function assignRole(string|Role $role): void
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->orWhere('slug', $role)->firstOrFail();
        }

        $this->roles()->syncWithoutDetaching($role);
    }

    /**
     * Remove a role from the user.
     */
    public function removeRole(string|Role $role): void
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->orWhere('slug', $role)->firstOrFail();
        }

        $this->roles()->detach($role);
    }

    /**
     * Check if the user has a specific role.
     */
    public function hasRole(string|Role $role): bool
    {
        if (is_string($role)) {
            return $this->roles()->where('name', $role)->orWhere('slug', $role)->exists();
        }

        return $this->roles()->where('id', $role->id)->exists();
    }

    /**
     * Check if the user has any of the given roles.
     */
    public function hasAnyRole(array $roles): bool
    {
        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if the user has all of the given roles.
     */
    public function hasAllRoles(array $roles): bool
    {
        foreach ($roles as $role) {
            if (!$this->hasRole($role)) {
                return false;
            }
        }

        return true;
    }
}

<?php namespace App\Providers;

use App\Services\Luster\Luster;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

/**
 * Class LusterServiceProvider
 * @package App\Providers
 */
class LusterServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Package boot method
	 */
	public function boot() {
		$this->registerBladeExtensions();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerLuster();
		$this->registerFacade();
		$this->registerBindings();
	}

	/**
	 * Register the application bindings.
	 *
	 * @return void
	 */
	private function registerLuster()
	{
		$this->app->bind('Luster', function($app) {
			return new Luster($app);
		});
	}

	/**
	 * Register the vault facade without the user having to add it to the app.php file.
	 *
	 * @return void
	 */
	public function registerFacade() {
		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Luster', \App\Services\Luster\Facades\Luster::class);
		});
	}

	/**
	 * Register service provider bindings
	 */
	public function registerBindings() {
		$this->app->bind(
			\App\Repositories\Frontend\Auth\AuthenticationContract::class,
			\App\Repositories\Frontend\Auth\EloquentAuthenticationRepository::class
		);

		$this->app->bind(
			\App\Repositories\Frontend\User\UserContract::class,
			\App\Repositories\Frontend\User\EloquentUserRepository::class
		);

		$this->app->bind(
			\App\Repositories\Backend\User\UserContract::class,
			\App\Repositories\Backend\User\EloquentUserRepository::class
		);

		$this->app->bind(
			\App\Repositories\Backend\Role\RoleRepositoryContract::class,
			\App\Repositories\Backend\Role\EloquentRoleRepository::class
		);

		$this->app->bind(
			\App\Repositories\Backend\Permission\PermissionRepositoryContract::class,
			\App\Repositories\Backend\Permission\EloquentPermissionRepository::class
		);

		$this->app->bind(
			\App\Repositories\Backend\Permission\Group\PermissionGroupRepositoryContract::class,
			\App\Repositories\Backend\Permission\Group\EloquentPermissionGroupRepository::class
		);

		$this->app->bind(
			\App\Repositories\Backend\Permission\Dependency\PermissionDependencyRepositoryContract::class,
			\App\Repositories\Backend\Permission\Dependency\EloquentPermissionDependencyRepository::class
		);
	}

	/**
	 * Register the blade extender to use new blade sections
	 */
	protected function registerBladeExtensions() {
		/**
		 * Role based blade extensions
		 * Accepts either string of Role Name or Role ID
		 */
		Blade::directive('role', function($role) {
			return "<?php if (Luster()->hasRole{$role}): ?>";
		});

		/**
		 * Accepts array of names or id's
		 */
		Blade::directive('roles', function($roles) {
			return "<?php if (Luster()->hasRoles{$roles}): ?>";
		});

		Blade::directive('needsroles', function($roles) {
			return "<?php if (Luster()->hasRoles(".$roles.", true)): ?>";
		});

		/**
		 * Permission based blade extensions
		 * Accepts wither string of Permission Name or Permission ID
		 */
		Blade::directive('permission', function($permission) {
			return "<?php if (Luster()->can{$permission}): ?>";
		});

		/**
		 * Accepts array of names or id's
		 */
		Blade::directive('permissions', function($permissions) {
			return "<?php if (Luster()->canMultiple{$permissions}): ?>";
		});

		Blade::directive('needspermissions', function($permissions) {
			return "<?php if (Luster()->canMultiple(".$permissions.", true)): ?>";
		});

		/**
		 * Generic if closer to not interfere with built in blade
		 */
		Blade::directive('endauth', function() {
			return "<?php endif; ?>";
		});
	}
}
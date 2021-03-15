<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth'], 'as' => 'admin.', 'prefix' => 'admin'], function () {

    Route::get('dashboard', 'Admin\HomeController@index')->name('dashboard');

    //Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'Admin\CategoryController@index')->name('category');
        Route::get('data', 'Admin\CategoryController@data')->name('category.data');
        Route::get('create', 'Admin\CategoryController@create')->name('category.create');
        Route::post('create', 'Admin\CategoryController@store')->name('category.store');
        Route::get('edit/{id}', 'Admin\CategoryController@edit')->name('category.edit');
        Route::put('update/{id}', 'Admin\CategoryController@update')->name('category.update');
        Route::delete('destroy/{id}', 'Admin\CategoryController@destroy')->name('category.destroy');
    });

    Route::group(['prefix' => 'subcategory'], function () {
        Route::get('', 'Admin\SubcategoryController@index')->name('subcategory');
        Route::get('data', 'Admin\SubcategoryController@data')->name('subcategory.data');
        Route::get('create', 'Admin\SubcategoryController@create')->name('subcategory.create');
        Route::post('create', 'Admin\SubcategoryController@store')->name('subcategory.store');
        Route::get('edit/{id}', 'Admin\SubcategoryController@edit')->name('subcategory.edit');
        Route::put('update/{id}', 'Admin\SubcategoryController@update')->name('subcategory.update');
        Route::delete('destroy/{id}', 'Admin\SubcategoryController@destroy')->name('subcategory.destroy');
    });

    Route::group(['prefix' => 'faqs'], function () {
        Route::get('', 'Admin\FaqController@index')->name('faqs');
        Route::get('data', 'Admin\FaqController@data')->name('faqs.data');
        Route::get('create', 'Admin\FaqController@create')->name('faqs.create');
        Route::post('create', 'Admin\FaqController@store')->name('faqs.store');
        Route::get('edit/{id}', 'Admin\FaqController@edit')->name('faqs.edit');
        Route::put('update/{id}', 'Admin\FaqController@update')->name('faqs.update');
        Route::delete('destroy/{id}', 'Admin\FaqController@destroy')->name('faqs.destroy');
    });

    Route::group(['prefix' => 'users-admin'], function () {
        Route::get('', 'Admin\UserAdminController@index')->name('usersadmin');
        Route::get('data', 'Admin\UserAdminController@data')->name('usersadmin.data');
        Route::get('create', 'Admin\UserAdminController@create')->name('usersadmin.create');
        Route::post('create', 'Admin\UserAdminController@store')->name('usersadmin.store');
        Route::get('edit/{id}', 'Admin\UserAdminController@edit')->name('usersadmin.edit');
        Route::put('update/{id}', 'Admin\UserAdminController@update')->name('usersadmin.update');
        Route::delete('destroy/{id}', 'Admin\UserAdminController@destroy')->name('usersadmin.destroy');
    });

    Route::group(['prefix' => 'provider'], function () {
        Route::get('', 'Admin\ProviderController@index')->name('provider');
        Route::get('data', 'Admin\ProviderController@data')->name('provider.data');
        Route::get('create', 'Admin\ProviderController@create')->name('provider.create');
        Route::post('create', 'Admin\ProviderController@store')->name('provider.store');
        Route::get('edit/{id}', 'Admin\ProviderController@edit')->name('provider.edit');
        Route::put('update/{id}', 'Admin\ProviderController@update')->name('provider.update');
        Route::delete('destroy/{id}', 'Admin\ProviderController@destroy')->name('provider.destroy');
    });

    Route::group(['prefix' => 'producer'], function () {
        Route::get('', 'Admin\ProducerController@index')->name('producer');
        Route::get('data', 'Admin\ProducerController@data')->name('producer.data');
        Route::get('create', 'Admin\ProducerController@create')->name('producer.create');
        Route::post('create', 'Admin\ProducerController@store')->name('producer.store');
        Route::get('edit/{id}', 'Admin\ProducerController@edit')->name('producer.edit');
        Route::put('update/{id}', 'Admin\ProducerController@update')->name('producer.update');
        Route::delete('destroy/{id}', 'Admin\ProducerController@destroy')->name('producer.destroy');
    });

    Route::group(['prefix' => 'operator'], function () {
        Route::get('', 'Admin\OperatorController@index')->name('operator');
        Route::get('data', 'Admin\OperatorController@data')->name('operator.data');
        Route::get('create', 'Admin\OperatorController@create')->name('operator.create');
        Route::post('create', 'Admin\OperatorController@store')->name('operator.store');
        Route::get('edit/{id}', 'Admin\OperatorController@edit')->name('operator.edit');
        Route::put('update/{id}', 'Admin\OperatorController@update')->name('operator.update');
        Route::delete('destroy/{id}', 'Admin\OperatorController@destroy')->name('operator.destroy');
    });

    Route::group(['prefix' => 'order'], function () {
        Route::get('', 'Admin\OrderController@index')->name('order');
        Route::get('data', 'Admin\OrderController@data')->name('order.data');
        Route::get('create', 'Admin\OrderController@create')->name('order.create');
        Route::post('create', 'Admin\OrderController@store')->name('order.store');
        Route::get('edit/{id}', 'Admin\OrderController@edit')->name('order.edit');
        Route::put('update/{id}', 'Admin\OrderController@update')->name('order.update');
        Route::delete('destroy/{id}', 'Admin\OrderController@destroy')->name('order.destroy');
    });


    //-----------------------------


    Route::group(['prefix' => 'email'], function () {
        Route::get('inbox', function () {
            return view('admin.pages.email.inbox');
        });
        Route::get('read', function () {
            return view('admin.pages.email.read');
        });
        Route::get('compose', function () {
            return view('admin.pages.email.compose');
        });
    });

    Route::group(['prefix' => 'apps'], function () {
        Route::get('chat', function () {
            return view('admin.pages.apps.chat');
        });
        Route::get('calendar', function () {
            return view('admin.pages.apps.calendar');
        });
    });

    Route::group(['prefix' => 'ui-components'], function () {
        Route::get('alerts', function () {
            return view('admin.pages.ui-components.alerts');
        });
        Route::get('badges', function () {
            return view('admin.pages.ui-components.badges');
        });
        Route::get('breadcrumbs', function () {
            return view('admin.pages.ui-components.breadcrumbs');
        });
        Route::get('buttons', function () {
            return view('admin.pages.ui-components.buttons');
        });
        Route::get('button-group', function () {
            return view('admin.pages.ui-components.button-group');
        });
        Route::get('cards', function () {
            return view('admin.pages.ui-components.cards');
        });
        Route::get('carousel', function () {
            return view('admin.pages.ui-components.carousel');
        });
        Route::get('collapse', function () {
            return view('admin.pages.ui-components.collapse');
        });
        Route::get('dropdowns', function () {
            return view('admin.pages.ui-components.dropdowns');
        });
        Route::get('list-group', function () {
            return view('admin.pages.ui-components.list-group');
        });
        Route::get('media-object', function () {
            return view('admin.pages.ui-components.media-object');
        });
        Route::get('modal', function () {
            return view('admin.pages.ui-components.modal');
        });
        Route::get('navs', function () {
            return view('admin.pages.ui-components.navs');
        });
        Route::get('navbar', function () {
            return view('admin.pages.ui-components.navbar');
        });
        Route::get('pagination', function () {
            return view('admin.pages.ui-components.pagination');
        });
        Route::get('popovers', function () {
            return view('admin.pages.ui-components.popovers');
        });
        Route::get('progress', function () {
            return view('admin.pages.ui-components.progress');
        });
        Route::get('scrollbar', function () {
            return view('admin.pages.ui-components.scrollbar');
        });
        Route::get('scrollspy', function () {
            return view('admin.pages.ui-components.scrollspy');
        });
        Route::get('spinners', function () {
            return view('admin.pages.ui-components.spinners');
        });
        Route::get('tabs', function () {
            return view('admin.pages.ui-components.tabs');
        });
        Route::get('tooltips', function () {
            return view('admin.pages.ui-components.tooltips');
        });
    });

    Route::group(['prefix' => 'advanced-ui'], function () {
        Route::get('cropper', function () {
            return view('admin.pages.advanced-ui.cropper');
        });
        Route::get('owl-carousel', function () {
            return view('admin.pages.advanced-ui.owl-carousel');
        });
        Route::get('sweet-alert', function () {
            return view('admin.pages.advanced-ui.sweet-alert');
        });
    });

    Route::group(['prefix' => 'forms'], function () {
        Route::get('basic-elements', function () {
            return view('admin.pages.forms.basic-elements');
        });
        Route::get('advanced-elements', function () {
            return view('admin.pages.forms.advanced-elements');
        });
        Route::get('editors', function () {
            return view('admin.pages.forms.editors');
        });
        Route::get('wizard', function () {
            return view('admin.pages.forms.wizard');
        });
    });

    Route::group(['prefix' => 'charts'], function () {
        Route::get('apex', function () {
            return view('admin.pages.charts.apex');
        });
        Route::get('chartjs', function () {
            return view('admin.pages.charts.chartjs');
        });
        Route::get('flot', function () {
            return view('admin.pages.charts.flot');
        });
        Route::get('morrisjs', function () {
            return view('admin.pages.charts.morrisjs');
        });
        Route::get('peity', function () {
            return view('admin.pages.charts.peity');
        });
        Route::get('sparkline', function () {
            return view('admin.pages.charts.sparkline');
        });
    });

    Route::group(['prefix' => 'tables'], function () {
        Route::get('basic-tables', function () {
            return view('admin.pages.tables.basic-tables');
        });
        Route::get('data-table', function () {
            return view('admin.pages.tables.data-table');
        });
    });

    Route::group(['prefix' => 'icons'], function () {
        Route::get('feather-icons', function () {
            return view('admin.pages.icons.feather-icons');
        });
        Route::get('flag-icons', function () {
            return view('admin.pages.icons.flag-icons');
        });
        Route::get('mdi-icons', function () {
            return view('admin.pages.icons.mdi-icons');
        });
    });

    Route::group(['prefix' => 'general'], function () {
        Route::get('blank-page', function () {
            return view('admin.pages.general.blank-page');
        });
        Route::get('faq', function () {
            return view('admin.pages.general.faq');
        });
        Route::get('invoice', function () {
            return view('admin.pages.general.invoice');
        });
        Route::get('profile', function () {
            return view('admin.pages.general.profile');
        });
        Route::get('pricing', function () {
            return view('admin.pages.general.pricing');
        });
        Route::get('timeline', function () {
            return view('admin.pages.general.timeline');
        });
    });

    Route::group(['prefix' => 'auth'], function () {
        Route::get('login', function () {
            return view('admin.pages.auth.login');
        });
        Route::get('register', function () {
            return view('admin.pages.auth.register');
        });
    });

    Route::group(['prefix' => 'error'], function () {
        Route::get('404', function () {
            return view('admin.admin.pages.error.404');
        });
        Route::get('500', function () {
            return view('admin.admin.pages.error.500');
        });
    });

});

Auth::routes(['verify' => true]);

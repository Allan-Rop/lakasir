<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\Category\BulkDelete;
use App\Http\Requests\Master\Category\Index;
use App\Http\Requests\Master\Category\Store;
use App\Http\Requests\Master\Category\Update;
use App\Repositories\Category as CategoryRepository;
use Sheenazien8\Hascrudactions\Traits\HasCrudAction;

class Category extends Controller
{
    use HasCrudAction;

    protected $viewPath = 'app.master.categories';

    protected $permission = 'category';

    protected $indexRequest = Index::class;

    protected $storeRequest = Store::class;

    protected $updateRequest = Update::class;

    protected $bulkDestroyRequest = BulkDelete::class;

    protected $resources = 'category';

    protected $repositoryClass = CategoryRepository::class;
}

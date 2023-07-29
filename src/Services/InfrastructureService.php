<?PHP

namespace ConfrariaWeb\Property\Services;

use ConfrariaWeb\Property\Models\Infrastructure;

class InfrastructureService extends Service
{

    public function __construct(Infrastructure $infrastructure)
    {
        $this->model = $infrastructure;
    }
}

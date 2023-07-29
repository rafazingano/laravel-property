<?PHP

namespace ConfrariaWeb\Property\Services;

use ConfrariaWeb\Property\Models\Finality;

class FinalityService extends Service
{
    public function __construct(Finality $finality)
    {
        $this->model = $finality;
    }
}

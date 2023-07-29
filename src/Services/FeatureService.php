<?PHP

namespace ConfrariaWeb\Property\Services;

use ConfrariaWeb\Property\Models\Feature;

class FeatureService extends Service
{

    public function __construct(Feature $feature)
    {
        $this->model = $feature;
    }
}

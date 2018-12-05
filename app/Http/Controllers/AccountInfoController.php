<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccountInfoRequest;
use App\Http\Requests\UpdateAccountInfoRequest;
use App\Repositories\AccountInfoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AccountInfoController extends AppBaseController
{
    /** @var  AccountInfoRepository */
    private $accountInfoRepository;

    public function __construct(AccountInfoRepository $accountInfoRepo)
    {
        $this->accountInfoRepository = $accountInfoRepo;
    }

    /**
     * Display a listing of the AccountInfo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->accountInfoRepository->pushCriteria(new RequestCriteria($request));
        $accountInfos = $this->accountInfoRepository->all();

        return view('account_infos.index')
            ->with('accountInfos', $accountInfos);
    }

    /**
     * Show the form for creating a new AccountInfo.
     *
     * @return Response
     */
    public function create()
    {
        return view('account_infos.create');
    }

    /**
     * Store a newly created AccountInfo in storage.
     *
     * @param CreateAccountInfoRequest $request
     *
     * @return Response
     */
    public function store(CreateAccountInfoRequest $request)
    {
        $input = $request->all();

        $accountInfo = $this->accountInfoRepository->create($input);

        Flash::success('Account Info saved successfully.');

        return redirect(route('accountInfos.index'));
    }

    /**
     * Display the specified AccountInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountInfo = $this->accountInfoRepository->findWithoutFail($id);

        if (empty($accountInfo)) {
            Flash::error('Account Info not found');

            return redirect(route('accountInfos.index'));
        }

        return view('account_infos.show')->with('accountInfo', $accountInfo);
    }

    /**
     * Show the form for editing the specified AccountInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountInfo = $this->accountInfoRepository->findWithoutFail($id);

        if (empty($accountInfo)) {
            Flash::error('Account Info not found');

            return redirect(route('accountInfos.index'));
        }

        return view('account_infos.edit')->with('accountInfo', $accountInfo);
    }

    /**
     * Update the specified AccountInfo in storage.
     *
     * @param  int              $id
     * @param UpdateAccountInfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccountInfoRequest $request)
    {
        $accountInfo = $this->accountInfoRepository->findWithoutFail($id);

        if (empty($accountInfo)) {
            Flash::error('Account Info not found');

            return redirect(route('accountInfos.index'));
        }

        $accountInfo = $this->accountInfoRepository->update($request->all(), $id);

        Flash::success('Account Info updated successfully.');

        return redirect(route('accountInfos.index'));
    }

    /**
     * Remove the specified AccountInfo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountInfo = $this->accountInfoRepository->findWithoutFail($id);

        if (empty($accountInfo)) {
            Flash::error('Account Info not found');

            return redirect(route('accountInfos.index'));
        }

        $this->accountInfoRepository->delete($id);

        Flash::success('Account Info deleted successfully.');

        return redirect(route('accountInfos.index'));
    }
}

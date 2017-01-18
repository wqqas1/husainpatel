<?php

namespace App;
Use Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Role() {

      return $this->belongsTo(Role::class);

      }
      public function proposals() {

        return $this->hasOne(Proposal::class);

        }
        public function addProposal(Proposal $proposal) {

            return $this->proposals()->save($proposal);

          }



          public function partners() {

            return $this->hasOne(Partner::class);

            }

            public function addPartner(Partner $partner) {

              return  $this->partners()->save($partner);
            }
            public function reservations() {

              return $this->hasMany(Reservation::class);

            }
            public function addReservation(Reservation $reservation) {

                return $this->reservations()->save($reservation);

               }

}

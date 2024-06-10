@extends('Layout')

@section('title_nm','Answer These Questions For Adopting Pet')

@section('Navbar')
@include('Pet-Adaptor.NAV.AuthNav')

@section('Main')
<div id="dropdown-content" class="hidden flex flex-col items-center justify-between absolute z-10 right-0 mt-0 w-48 bg-white rounded-md shadow-lg space-y-4">
    <div class="part-1 flex flex-row items-center justify-between space-x-4">
        <img src="{{asset('Images/dashboard.webp')}}" alt="" class="h-6 w-6">
        <a href="{{route('adaptor-dashboard')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold">Dashboard</a>
      </div>
    <div class="part-1 flex flex-row items-center justify-between space-x-4">
      <img src="{{asset('Images/profile.png')}}" alt="" class="h-6 w-6">
      <a href="{{route('adaptor-my-profile')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold">My Profile</a>
    </div>
    <div class="part-1 flex flex-row items-center justify-between">
      <img src="{{asset('Images/my-pets.png')}}" alt="" class="h-6 w-6">
      <a href="{{ route('adaptor-pets') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-8">My Pets</a>
    </div>
    <div class="part-1 flex flex-row items-center justify-between">
      <img src="{{asset('Images/address.png')}}" alt="" class="h-6 w-6">
      <a href="{{route('adaptor-change-password-view')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-1">Change Password</a>
    </div>
    <div class="part-1 flex flex-row items-center justify-between">
      <img src="{{asset('Images/history.png')}}" alt="" class="h-6 w-6">
      <a href="{{route('Adaptor-History-view')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-1">My History</a>
    </div>
    <div class="part-1 flex flex-row items-center justify-between">
      <img src="{{asset('Images/logout.png')}}" alt="" class="h-6 w-6">
      <a href="{{route('adaptor-logout')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-[1.5rem]">Logout</a>
    </div>
</div>
@foreach($pets as $p)
    

<div class="bg-gradient-to-r from-blue-400 to-purple-500 min-h-screen flex items-center justify-center p-5">

    <div class="bg-white rounded-lg shadow-md w-full sm:w-96 p-8">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Let's Check How can you take care for {{$p->pet_name}}</h1>
        <div id="quiz">
            <form id="quizForm" action="{{route('adaptor-calculateScore')}}" method="POST">
                @csrf
                <div id="quiz">
                    <div class="font-semibold mb-4">1. What factors influenced your decision to adopt a pet?</div>
                    <div class="mt-2">
                        <input type="hidden" name="pet_id" id="" value="{{$p->p_id}}">
                        <input type="hidden" name="donor_id" id="" value="{{$p->id}}">
                        <label class="block">
                            <input type="radio" name="question1" value="Good">
                            <span class="ml-2 text-gray-800">Desire for companionship</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question1" value="Great">
                            <span class="ml-2 text-gray-800">To save a life</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question1" value="Not Bad">
                            <span class="ml-2 text-gray-800">Recommendation from friends or family</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question1" value="Worst">
                            <span class="ml-2 text-gray-800">Other</span>
                        </label>

                    </div>
            
                    <!-- Repeat the above structure for each question -->
            
                    <!-- Question 2 -->
                    <div class="font-semibold mb-4">2. How long did it take you to find the right pet for adoption?</div>
                    <div class="mt-2">
                        <label class="block">
                            <input type="radio" name="question2" value="Worst">
                            <span class="ml-2 text-gray-800">Less than a week</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question2" value="Not Bad">
                            <span class="ml-2 text-gray-800">1-2 weeks</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question2" value="Good">
                            <span class="ml-2 text-gray-800">1-2 Months</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question2" value="Great">
                            <span class="ml-2 text-gray-800">More than 2 months</span>
                        </label>

                    </div>
            
                    <div class="font-semibold mb-4">3. Have you adopted a pet before?</div>
                    <div class="mt-2">
                        <label class="block">
                            <input type="radio" name="question3" value="Not Bad">
                            <span class="ml-2 text-gray-800">Yes</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question3" value="Great">
                            <span class="ml-2 text-gray-800">No</span>
                        </label>

                    </div>

                    <div class="font-semibold mb-4">4. How satisfied are you with your decision to adopt a pet?</div>
                    <div class="mt-2">
                        <label class="block">
                            <input type="radio" name="question4" value="Not Bad">
                            <span class="ml-2 text-gray-800">Somewhat satisfied</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question4" value="Good">
                            <span class="ml-2 text-gray-800">Neutral</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question4" value="Great">
                            <span class="ml-2 text-gray-800">Extremely satisfied</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question4" value="Worst">
                            <span class="ml-2 text-gray-800">Dissatisfied</span>
                        </label>

                    </div>

                    <div class="font-semibold mb-4">5. Would you recommend pet adoption to others?</div>
                    <div class="mt-2">
                        <label class="block">
                            <input type="radio" name="question5" value="Not Bad">
                            <span class="ml-2 text-gray-800">Yes, but with reservations</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question5" value="Worst">
                            <span class="ml-2 text-gray-800">No, not at all</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question5" value="Great">
                            <span class="ml-2 text-gray-800">Yes, definitely</span>
                        </label>

                    </div>

                    <div class="font-semibold mb-4">6. If your adopted pet begins to relieve itself inside the home, what would be your reaction?</div>
                    <div class="mt-2">
                        
                        <label class="block">
                            <input type="radio" name="question6" value="Worst">
                            <span class="ml-2 text-gray-800">Get frustrated and scold the pet for misbehaving.</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question6" value="Great">
                            <span class="ml-2 text-gray-800">Patiently train the pet to go outside and clean up the mess calmly.</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question6" value="Worst">
                            <span class="ml-2 text-gray-800">Seek advice from a veterinarian or animal behaviorist to address the issue.</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question6" value="Worst">
                            <span class="ml-2 text-gray-800">Consider returning the pet to the shelter/rescue organization.</span>
                        </label>

                    </div>

                    <div class="font-semibold mb-4">7. Your adopted pet frequently scratches furniture or other household items. How do you respond?</div>
                    <div class="mt-2">
                        <label class="block">
                            <input type="radio" name="question7" value="Worst">
                            <span class="ml-2 text-gray-800">Provide appropriate scratching posts and redirect the pet's behavior.</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question7" value="Worst">
                            <span class="ml-2 text-gray-800">Get upset and discipline the pet.</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question7" value="Great">
                            <span class="ml-2 text-gray-800">Ignore the behavior and hope it stops on its own.</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question7" value="Not Bad">
                            <span class="ml-2 text-gray-800">Consider declawing the pet.</span>
                        </label>

                    </div>
                    <div class="font-semibold mb-4">8. Your adopted pet exhibits signs of anxiety (e.g., excessive barking, destructive behavior) when left alone. What would you do?</div>
                    <div class="mt-2">
                        <label class="block">
                            <input type="radio" name="question8" value="Worst">
                            <span class="ml-2 text-gray-800">Punish the pet for its behavior.</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question8" value="Good">
                            <span class="ml-2 text-gray-800">Gradually acclimate the pet to being alone and seek advice from a professional if needed.</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question8" value="Worst">
                            <span class="ml-2 text-gray-800">Rehome the pet.</span>
                        </label>
                    </div>

                    <div class="font-semibold mb-4">9. Your adopted pet is displaying aggression towards other animals or people. How would you handle this situation?</div>
                    <div class="mt-2">
                        <label class="block">
                            <input type="radio" name="question9" value="Great">
                            <span class="ml-2 text-gray-800">Consult a professional animal behaviorist for guidance and implement behavior modification techniques.</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question9" value="Worst">
                            <span class="ml-2 text-gray-800">Punish the pet for its aggressive behavior.</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question9" value="Worst">
                            <span class="ml-2 text-gray-800">Avoid situations that trigger aggression.</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question9" value="Worst">
                            <span class="ml-2 text-gray-800">Return the pet to the shelter/rescue organization.</span>
                        </label>
                    </div>

                    <div class="font-semibold mb-4">10. Your adopted pet refuses to eat the food provided. How do you address this issue?</div>
                    <div class="mt-2">
                        <label class="block">
                            <input type="radio" name="question10" value="Worst">
                            <span class="ml-2 text-gray-800">Force the pet to eat the food provided.</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question10" value="Worst">
                            <span class="ml-2 text-gray-800">the issue and hope the pet will eventually eat.</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question10" value="Worst">
                            <span class="ml-2 text-gray-800">Return the pet to the shelter/rescue organization.</span>
                        </label>
                        <label class="block">
                            <input type="radio" name="question10" value="Great">
                            <span class="ml-2 text-gray-800">Try offering different types of food to find one the pet enjoys.</span>
                        </label>
                    </div>
            
                </div>
                <button type="submit" class="block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-8 focus:outline-none focus:ring focus:ring-blue-300">Submit</button>
            </form>
            
        </div>
    </div>
</div>

@endforeach

@section('footer')
@include('Navbar And Footer.footer')

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        

        const quizContainer = document.getElementById('quiz');
        const submitButton = document.getElementById('submitBtn');

        function buildQuiz() {
            questions.forEach((question, index) => {
                const questionElement = document.createElement('div');
                questionElement.classList.add('mb-4');
                questionElement.innerHTML = `
                    <div class="font-semibold">${index + 1}. ${question.question}</div>
                    <div class="mt-2">
                        ${question.answers.map(answer => `
                            <label class="block">
                                <input type="radio" name="question${index}" value="${answer.correct}">
                                <span class="ml-2 text-gray-800">${answer.text}</span>
                            </label>
                        `).join('')}
                    </div>
                `;
                quizContainer.appendChild(questionElement);
            });
        }

        function calculateScore() {
            let score = 0;
            questions.forEach((question, index) => {
                const selectedAnswer = document.querySelector(`input[name="question${index}"]:checked`);
                if (selectedAnswer && selectedAnswer.value === "Great") {
                    score += 10;
                }else if (selectedAnswer && selectedAnswer.value === "Good") {
                    score += 8;
                }else if (selectedAnswer && selectedAnswer.value === "Not Bad") {
                    score += 6;
                }
                else if (selectedAnswer && selectedAnswer.value === "Worst") {
                    score += 2;
                }
            });
            return score;
        }

        submitButton.addEventListener('click', () => {
            const score = calculateScore();
            Swal.fire({
                title: 'Quiz Result',
                text: `Your score is ${score} out of 100`,
                icon: 'info',
                confirmButtonText: 'Close'
            });
        });

        buildQuiz();

        document.addEventListener('DOMContentLoaded', function () {
            const hamburgerMenu = document.getElementById('hamburger-menu');
            const menuOverlay = document.getElementById('menu-overlay');
            const closeMenuButton = document.getElementById('close-menu');

            hamburgerMenu.addEventListener('click', function () {
                menuOverlay.classList.remove('hidden');
            });

            closeMenuButton.addEventListener('click', function () {
                menuOverlay.classList.add('hidden');
            });
        });

    </script>
@extends('layout.theme')
@include('layout.Home_navbar')
@section('content')
<div class="container2">
        <div class="tiltle">
            <h2>About Us</h2>
        </div>
        <!-- ......... div for tisha profile......... -->
        <div class="profile">
            <div class="profile_cont">
                <img src="image/tisha.jpg">
                <h3>Israt Jahan Tisha</h3>
                <ul>
                    <li>Stamford University of Bangladesh</li>
                    <li><b>Email : </b>israt.working@gmail.com</li>
                    <li><a href="https://www.linkedin.com/in/israt-jahan-tisha-a55353246/"> LinkeDin</a></li>
                </ul>
            </div>
        </div>
        <!-- ......... div for  arnob profile......... -->
        <div class="profile">
            <div class="profile_cont">
                <img src="image/arnob.jpg">
                <h3>Hafiz Bin Azman Arnob</h3>
                <ul>
                    <li>Stamford University of Bangladesh</li>
                    <li><b>Email :</b> arnob@gmail.com</li>
                    <li><a href="https://www.linkedin.com/in/hafiz-bin-azman-arnob-41039923a/"> LinkeDin</a></li>
                </ul>
            </div>
        </div>
        <!-- .....div for blockchain..... -->
        <div class="about">
            <img src="{{URL::asset('image/block_chain.jpg')}}">
            <h3>ABOUT BLOCKCHAIN</h3>
            <div class="visible_cont">
                <p>
                    Blockchain is a revolutionary technology that has transformed the way we think about digital transactions, data security, and trust. At its core, a blockchain is a decentralized and distributed digital ledger that records transactions across a network
                    of computers.
                    <br>
                    <p>
                        In blockchain each transaction is grouped into a "block," and these blocks are linked together in chronological order to form a "chain." What sets blockchain apart is its decentralized nature – instead of relying on a single central authority, multiple
                        participants (nodes) in the network collectively validate and update the ledger. This decentralization ensures greater security, resilience, and trust as no single entity has complete control over the data.

                    </p>
                </p>
            </div>
            <div class="invisible_cont">
                <p>
                    <b>Security and Immutability:</b> Transactions stored on a blockchain are encrypted and linked in a way that makes altering historical records virtually impossible. Once a block is added to the chain, it becomes extremely difficult
                    to modify, ensuring data integrity and reducing the risk of fraud.....
                </p>

                <p>
                    <b>Decentralization:</b> Traditional systems often rely on a central authority for verification and validation. Blockchain distributes these functions across a network, eliminating the need for intermediaries and making the system
                    more resistant to single points of failure or malicious attacks.
                </p>

                <p>
                    <b>Transparency:</b> All participants in a blockchain network can view the same set of transactions and records. This transparency fosters trust among participants, as it becomes harder to manipulate or hide information.
                </p>

                <p>
                    <b>Efficiency and Cost Savings:</b> Blockchain can streamline processes by removing intermediaries and automating trust.
                </p>

                <p>
                    <b>Global Accessibility:  </b> Blockchain operates on a global network, enabling secure and efficient cross-border transactions without the need for complex intermediaries.
                </p>

                <p>
                    <b>Diverse Applications:  </b> While initially associated with cryptocurrencies, blockchain has found applications in various industries, including finance, supply chain management, healthcare, real estate, voting systems, identity
                    management, and more.
                </p>
            </div>
            <button id="btn"> Read More</button>

        </div>
        <!-- .....div for Smart Contract..... -->
        <div class="about">
            <img src="{{URL::asset('image/smart_contract.jpg')}}">
            <h3>ABOUT SMART CONTRACT</h3>
            <div class="visible_cont">
                <p>
                    A smart contract is a self-executing contract with the terms of the agreement directly written into lines of code. These contracts automatically execute and enforce themselves when certain conditions are met. Smart contracts are typically built on blockchain
                    platforms like Ethereum, although they can also be implemented on other blockchain technologies.
                </p>

                <p>
                    <b>Decentralization:</b> Smart contracts are executed on a decentralized blockchain network. This means that no single entity has control over the contract's execution or enforcement. Once deployed, the contract operates autonomously
                    based on the programmed instructions.
                </p>

                <p>
                    <b>Automation:</b> Smart contracts automate the execution of contract terms.
                </p>
            </div>
            <div class="invisible_cont">
                <p>
                    When predefined conditions are met (e.g., a specific date is reached, a payment is received), the contract automatically triggers the specified actions without requiring manual intervention.
                </p>

                <p>

                    <b>Transparency:</b> Since smart contracts operate on a blockchain, their code and execution are visible to all participants on the network. This transparency helps build trust among parties, as they can independently verify the contract's
                    behavior.
                </p>

                <p>
                    <b>Immutable: </b> Once a smart contract is deployed on a blockchain, its code and state are typically immutable. This means that the contract's terms cannot be altered, and historical data about its execution remains permanently recorded
                    on the blockchain.
                </p>

                <p>
                    <b>Security: </b> Smart contracts benefit from the security features of the underlying blockchain technology. They are resistant to fraud, tampering, and unauthorized changes due to the cryptographic nature of blockchain networks.
                </p>

                <p>
                    <b>Trustless Interactions: </b> Smart contracts enable trustless interactions between parties. Trust is established through the code itself and the consensus mechanisms of the blockchain, reducing the need for intermediaries.
                </p>

                <p>
                    <b>Applications:  </b> Smart contracts have a wide range of potential applications beyond traditional contracts, including supply chain management, financial services (e.g., automated lending protocols), voting systems, intellectual
                    property protection, and more.
                </p>
            </div>
            <button id="btn"> Read More</button>
        </div>
        <div class="cont">
            <p>
                <b>Purpose:
                </b> purpose of this project is to create a user-friendly and secure money transaction system utilizing blockchain technology. By harnessing the power of blockchain, this system aims to revolutionize traditional financial
                transactions by offering enhanced security, transparency, and efficiency.

            </p>


        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('js/script_about.js')}}"></script>


@endsection


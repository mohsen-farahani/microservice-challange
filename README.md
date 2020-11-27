<h1 align="center">Microservice Challange</h1>
<h2>Whats question ?</h2>
<p>
We have two separate services

Wallet and Discount

The Wallet Microservice is responsible for maintaining the user's financial information

and

Discount service The task of managing discount codes

We want to make the user add to his wallet by entering the charge code and be able to view his wallet
People who have received a recharge code should also be available
</p>


<h2>How did I solve this problem?</h2>
<p>
I used Rest API to communicate at the same time and got help from message broker(RabbitMQ) where communication between microservices was needed.

But the way this connection was established had to be modeled on a distributed transaction
Here I had two ways to do this process:

pm2 or saga pattern

I preferred the saga method
You can see my outline in the image below

Patterns for distributed transactions within a microservices architecture
</p>


<img src="Screenshot from 2020-11-27 13-19-14.png">


### Installation:


``` bash
git clone https://github.com/mohsen-farahani/microservice-challange.git
```

``` bash
docker-compose up -d
```

```
cd apps/gateway-api
```

```
install nodejs & npm
```

```
npm install
```

```
node index.js
```

```
localhost:3000
```


- <a href="apps/wallet/README.md">click for install wallet microservice</a>
- <a href="apps/discount/README.md">click for install discount microservice</a>


### endpoint apis:
- localhost:3000/campaigns/demand
- localhost:3000/wallets/{mobile}
- localhost:3000/users-campaigns


## Refrences:
- https://developers.redhat.com/blog/2018/10/01/patterns-for-distributed-transactions-within-a-microservices-architecture/

- https://microservices.io/patterns/apigateway.html

- https://medium.com/hackernoon/-creating-simple-api-gateway-using-node-js-6d5933c214b8

- https://designpatternsphp.readthedocs.io/en/latest/Behavioral/ChainOfResponsibilities/README.html



### todo:
- unit test
